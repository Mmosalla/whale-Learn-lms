<?php

namespace Modules\Comments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

// use Modules\Comments\Database\Factories\CourseCommentFactory;

class CourseComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'text',
        'like',
        'dislike',
        'status',
        'stars',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function userVote()
    {
        return $this->hasOne(UserCommentVote::class)
            ->where('user_id', auth()->id());
    }

    // protected static function newFactory(): CourseCommentFactory
    // {
    //     // return CourseCommentFactory::new();
    // }
}
