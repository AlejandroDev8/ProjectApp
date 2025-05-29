<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Level;
use Livewire\Component;

class CourseFilter extends Component
{
    public $categories;
    public $levels;

    public function mount()
    {
        $this->categories = Category::all();
        $this->levels = Level::all();
    }

    public function render()
    {
        return view('livewire.course-filter');
    }
}
