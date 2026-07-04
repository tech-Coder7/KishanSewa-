<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $table = 'crop';

    protected $fillable = [
        'title',
        'content',
        'categories_id',
        'image',
        'status',
        'is_home',
        'slug',
        'created_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'status' => 'boolean',
        'is_home' => 'boolean',
    ];

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}