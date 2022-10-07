<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacancy extends Component
{
    public $vacancy_id;//id
    public $title;//title
    public $salary;//salary
    public $category;//category name
    public $company;//company name
    public $last_day;//last day
    public $description;//description of the job
    public $image;//image
    public $new_image;//new image
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024',

    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy_id = $vacancy->id;
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
        //If there is a new image
        if($this->new_image){
            $image = $this->new_image->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies/', '', $image);

        }
        //search for the vacancy to be edited
        $vacancy = Vacancy::find($this->vacancy_id);
        //Assign the values
        $vacancy->title = $data['title'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->last_day = $data['last_day'];
        $vacancy->description = $data['description'];
        $vacancy->image = $data['image'] ?? $vacancy->image;

        //save the vacancy
        $vacancy->save();
        //redirect
        session()->flash('message', 'Vacancy was updated correctly ');
        return redirect()->route('vacancies.index');


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
