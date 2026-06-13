<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\app\Models\User;

// use Modules\Course\Database\Factories\LessonFactory;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'season_id',
        'title',
        'e_title',
        'status',
        'video',
        'attachment',
        'is_free'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class , 'season_id' , 'id');
    }

    // protected static function newFactory(): LessonFactory
    // {
    //     // return LessonFactory::new();
    // }
}
