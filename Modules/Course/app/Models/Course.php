<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Cart\Models\Cart;
use Modules\Category\app\Models\Category;
use Modules\Comments\Models\CourseComment;
use Modules\User\app\Models\User;

// use Modules\Course\Database\Factories\CourseFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'price',
        'level',
        'status',
        'image',
        'video',
        'discount',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function Comments()
    {
        return $this->hasMany(CourseComment::class);
    }

    public function courseLevelTranslator($level)
    {
        switch ($level){
            case 'professional': return "حرفه ای";
                break;
            case 'primary': return "متوسط";
                break;
            case 'easy': return "ساده";
                break;
        }
    }

    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(Lesson::class, Season::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // protected static function newFactory(): CourseFactory
    // {
    //     // return CourseFactory::new();
    // }
}
