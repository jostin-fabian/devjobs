<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class EditVacancy extends Component
{
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