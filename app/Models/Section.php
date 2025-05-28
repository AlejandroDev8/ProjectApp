<?php

namespace App\Models;

use App\Observers\SectionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([SectionObserver::class])]
class Section extends Model
{
    protected $fillable = [
        'title',
        'course_id',
        'position',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
