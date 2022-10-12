<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'updated_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
