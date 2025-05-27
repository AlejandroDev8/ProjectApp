<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Goal;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Goals extends Component
{
    public $course;

    public $goals;

    #[Validate('required|string|max:255')]
    public $title;

    public function mount($course)
    {
        $this->goals = Goal::where('course_id', $course->id)->get()->toArray();
    }

    public function store()
    {
        $this->validate();

        $this->course->goals()->create([
            'title' => $this->title,
        ]);

        $this->goals = Goal::where('course_id', $this->course->id)->get()->toArray();

        $this->reset('title');
    }

    public function update()
    {
        $this->validate([
            'goals.*.title' => 'required|string|max:255',
        ]);

        foreach ($this->goals as $goal) {
            Goal::find($goal['id'])->update(['title' => $goal['title']]);
        }

        $this->dispatch('alert', [
            'icon' => 'success',
            'title' => 'Goals updated successfully!',
            'text' => 'Your course goals have been updated.',
        ]);
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals');
    }
}
