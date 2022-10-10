<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
}
