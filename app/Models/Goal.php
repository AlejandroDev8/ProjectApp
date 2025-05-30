<?php

namespace App\Models;

use App\Observers\GoalObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([GoalObserver::class])]
class Goal extends Model
{
    protected $fillable = [
        'title',
        'course_id',
        'position',
    ];
}
