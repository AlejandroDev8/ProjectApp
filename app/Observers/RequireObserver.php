<?php

namespace App\Observers;

use App\Models\Requirement;

class RequireObserver
{
    public function creating($require)
    {
        $require->position = Requirement::where('course_id', $require->course_id)->max('position') + 1;
    }
}
