<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{
    public $title;//title of the vacancy
    public $description;//description of the job
    public $category;//category name
    public $salary;//salary
    public $company;//company name
    public $last_day;//last_day
    public $image;//image of the appointment

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];
    //use WithFileUploads
    use WithFileUploads;

    //create a new createVacancy function
    public function createVacancy()
    {
        $data = $this->validate();
    }

    function render()
    {
        //Query The Database
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
