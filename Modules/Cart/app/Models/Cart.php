<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

// use Modules\Cart\Database\Factories\CartFactory;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'user_id'
    ];

    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }
    public function course(): BelongsTo
    {
       return $this->belongsTo(Course::class);
    }

    // protected static function newFactory(): CartFactory
    // {
    //     // return CartFactory::new();
    // }
}
