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
        $vacancies = Vacancy::when($this->term, function ($query) {
            $query->where('title', 'LIKE', "%" . $this->term . "%");
        })
            ->when($this->term, function ($query) {
                $query->orWhere('company', 'LIKE', "%" . $this->term . "%");
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);

            })
            ->when($this->salary, function ($query) {
                $query->where('salary_id', $this->salary);
            })
            ->paginate(20);
        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
