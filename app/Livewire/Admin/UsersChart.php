<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersChart extends Component
{
    public $dates = [];
    public $counts = [];

    protected $listeners = ['refreshData' => 'getDailyRegistrations'];

    public function mount()
    {
        $this->getDailyRegistrations();
    }

    public function getDailyRegistrations()
    {
        $registrations = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $this->dates = $registrations->pluck('date')->toArray();
        $this->counts = $registrations->pluck('count')->toArray();


    }
    public function render()
    {
        return view('livewire.admin.users-chart');
    }
}
