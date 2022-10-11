<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use App\Models\Vacancy;
use App\Notifications\NewCandidate;
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
        $this->vacancy->recruiter->notify(new NewCandidate(
            $this->vacancy->id,
            $this->vacancy->title,
            auth()->user()->id
        ));

        //Show the user an ok message
        session()->flash('message', 'Your information was sent successfully, good luck');
        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
