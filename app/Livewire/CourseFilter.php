<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CourseFilter extends Component
{
    use WithPagination;

    public $categories;
    public $levels;

    public function mount()
    {
        $this->categories = Category::all();
        $this->levels = Level::all();
    }

    public function render()
    {
        $courses = Course::where('status', 2)->paginate(10);

        return view('livewire.course-filter', compact('courses'));
    }
}
