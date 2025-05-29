<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class ManageShoppingCart extends Component
{
    public function render()
    {
        $courses = Course::where('status', 2)->paginate(1);

        return view('livewire.manage-shopping-cart', compact('courses'));
    }
}
