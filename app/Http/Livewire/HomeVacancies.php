<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancies extends Component
{
    public $term;// term for filtering
    public $category;//category for filtering
    public $salary;//salary for filtering
    protected $listeners = ['searchTerms' => 'search'];

    public function search($term, $category, $salary)
    {
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;

    }

    public function render()
    {
        $vacancies = Vacancy::all();
        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
