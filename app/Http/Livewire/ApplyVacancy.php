<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    public $cv;//cv
    use WithFileUploads;
    public $vacancy;//vacancy


    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function applyTo()
    {
        $data = $this->validate();
        //Store cv in disc
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        //Create the candidate for the vacancy
        $this->vacancy->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
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
