<?php
namespace App\Livewire\Pages;

use App\Models\VoiceRecord;
use Livewire\Component;
use Livewire\WithFileUploads;

class Map extends Component
{
    use WithFileUploads;

    public $latitude;
    public $longitude;
    public $audio;

    protected $listeners = ['setLatitudeLongitudeAndAudio'];

    public function setLatitudeLongitudeAndAudio($latitude, $longitude, $audioPath)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->audio = $audioPath;
        $this->save();
    }

    public function save()
    {
        $this->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'audio' => 'required|string',
        ]);

        VoiceRecord::create([
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'audio_path' => $this->audio,
        ]);

        flash()->addSuccess('Voice recorded successfully!');

    }

    public function render()
    {
        return view('livewire.pages.map');
    }
}
