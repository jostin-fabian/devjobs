<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApplyVacancy extends Component
{
    public $cv;//cv
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function applyTo()
    {
        $this->validate();
        //Store cv in disc
        //create vacancy
        //Create the notification and send the email
        //Show the user an ok message

    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
