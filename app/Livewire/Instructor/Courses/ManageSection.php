<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Section;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ManageSection extends Component
{
    public $course;
    public $sections;

    #[Validate('required|string|max:255')]
    public $title;

    public function mount()
    {
        $this->sections = Section::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function store()
    {
        $this->validate();

        $this->course->sections()->create([
            'title' => $this->title,
        ]);

        $this->reset('title');
    }

    public function render()
    {
        return view('livewire.instructor.courses.manage-section');
    }
}
