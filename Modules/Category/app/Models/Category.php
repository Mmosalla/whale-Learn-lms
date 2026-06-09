<?php

namespace Modules\Category\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Category\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')
            ->withDefault(['title' => "دسته بندی اصلی"]);
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    // protected static function newFactory(): CategoryFactory
    // {
    //     // return CategoryFactory::new();
    // }


    protected static function boot()
    {
        parent::boot();
        Category::deleting(function ($category) {
            foreach ($category->child()->get() as $child) {
                $child->update(['parent_id' => 0]);
            }
        });
    }
}
