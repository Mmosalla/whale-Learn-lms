<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\app\Models\User;

// use Modules\Course\Database\Factories\SeasonFactory;

class Season extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'user_id',
        'title',
        'priority'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    // protected static function newFactory(): SeasonFactory
    // {
    //     // return SeasonFactory::new();
    // }
}
