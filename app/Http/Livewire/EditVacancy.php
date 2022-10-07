<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditVacancy extends Component
{
    public $title;
    public $salary;//salary
    public $category;//category name
    public $company;//company name
    public $last_day;//last_day
    public $description;//description of the job
    public $image;//image

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->last_day = Carbon::parse($vacancy->last_day)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function editVacancy()
    {
        $data = $this->validate();


    }

    public function render()
    {
        //Query The Database
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories

        ]);
    }
}
