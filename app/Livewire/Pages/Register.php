<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;


class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $verification_code;
    public $sent_verification_code; // Store the verification code sent to the user
    public $timer;
    public $user;
    public $show_timer = false;

    public function mount()
    {
        $this->timer = 180; // 3 minutes in seconds
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'verification_code' => 'required|size:4'
        ]);

        if (is_null($this->sent_verification_code)) {
            flash()->addError('The verification code has expired. Please request a new one.');
            return;
        }

        if ($this->verification_code != $this->sent_verification_code) {
            flash()->addError('The verification code is incorrect.');
            return;
        }

        try {
            $this->user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
            flash()->addSuccess('Registration was successful');
            Auth::login($this->user);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            flash()->addError('There was a problem with your registration.');
        }
    }

    public function sendVerificationCode()
    {
        if (is_null($this->email)) {
            flash()->addError('The email field is empty');
            return;
        }

        $this->sent_verification_code = random_int(1000, 9999);

        try {
            Mail::to($this->email)->send(new \App\Mail\VerificationCodeMail($this->sent_verification_code));
            $this->show_timer = true;
            $this->timer = 180; // Reset timer to 3 minutes
            $this->dispatch('start-timer');
            flash()->addSuccess('Verification code sent successfully.');
        } catch (Exception $e) {
            Log::error($e->getMessage() . " Email sending error");
            flash()->addError('There was a problem sending the verification code.');
            return;
        }
    }

    public function updateTimer()
    {
        if ($this->timer > 0) {
            $this->timer--;
        } else {
            $this->show_timer = false;
            $this->sent_verification_code = null; // Invalidate the verification code
        }
    }

    public function redirectGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            flash()->addError('There was a problem with your registration.');
            return redirect()->back();
        }
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                auth()->login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('password'),
                ]);
                auth()->login($newUser);
            }

            flash()->addSuccess('Registration successfully.');
            return redirect()->route('home'); // Replace 'home' with your desired route
        } catch (Exception $e) {
            Log::error($e->getMessage());
            flash()->addError('There was a problem with your registration.');
            return redirect()->back();
        }
    }

    public function redirectFaceBook()
    {
        try {
            return Socialite::driver('facebook')->redirect();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            flash()->addError('There was a problem with your registration.');
            return redirect()->back();
        }
    }

    public function callbackFaceBook()
    {

    }

    public function render()
    {
        return view('livewire.pages.register');
    }
}
