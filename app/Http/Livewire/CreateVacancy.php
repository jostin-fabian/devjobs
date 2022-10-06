<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateVacancy extends Component
{
    public function render()
    {
        //Query The Database

        return view('livewire.create-vacancy');
    }
}
