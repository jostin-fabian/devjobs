<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAlert extends Component
{
    public $message;

    function render()
    {
        return view('livewire.show-alert');
    }
}
