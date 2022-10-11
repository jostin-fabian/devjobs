<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    public $cv;//cv
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function applyTo()
    {
        $this->validate();
        //Store cv in disc
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        //create vacancy

        Candidate::create([
            'cv' => $data['title'],
            'vacancy_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);
        //Create the notification and send the email
        session()->flash('message', 'The vacancy was correctly published');

        //Show the user an ok message

    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
