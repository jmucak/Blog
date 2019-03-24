<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // Add title to the fillable array in your model Post, to allow saving through create and massive methods
    protected $fillable = ['title', 'content', 'category_id', 'featured'];
    // relacija sa kategorijom
    // post može imati samo jednu kategoriju

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
