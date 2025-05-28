<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Requirement;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Requirements extends Component
{
    public $course;
    public $requirements;

    #[Validate('required|string|max:255')]
    public $title;

    public function mount()
    {
        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function store()
    {
        $this->validate();

        $this->course->requirements()->create([
            'title' => $this->title,
        ]);

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

        $this->reset('title');
    }

    public function update()
    {
        $this->validate([
            'requirements.*.title' => 'required|string|max:255'
        ]);

        foreach ($this->requirements as $requirement) {
            Requirement::find($requirement['id'])->update(['title' => $requirement['title']]);
        }

        $this->dispatch('alert', [
            'icon' => 'success',
            'title' => 'Requirements updated successfully!',
            'text' => 'Your course requirements have been updated.',
        ]);
    }

    public function destroyRequirement($requirementId)
    {
        Requirement::find($requirementId)->delete();

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function sortRequirements($data)
    {
        foreach ($data as $index => $requirementId) {
            Requirement::find($requirementId)->update(['position' => $index + 1]);
        }

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.instructor.courses.requirements');
    }
}
