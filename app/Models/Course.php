<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'level_id',
        'price_id',
        'title',
        'slug',
        'summary',
        'description',
        'status',
        'image_path',
        'video_path',
        'welcome_message',
        'goodbye_message',
        'observations',
    ];

    protected $casts = [
        'status' => CourseStatus::class,
    ];

    protected function image(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->image_path ? Storage::url($this->image_path) : null;
            }
        );
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
