<?php

namespace App\Models;

use App\Observers\RequireObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([RequireObserver::class])]
class Requirement extends Model
{
    protected $fillable = [
        'title',
        'course_id',
        'position',
    ];
}
