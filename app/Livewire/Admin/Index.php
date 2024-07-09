<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.admin.index')->layout("components.layouts.admin");
    }
}
