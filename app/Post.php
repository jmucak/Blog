<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // Add title to the fillable array in your model Post, to allow saving through create and massive methods
    protected $fillable = ['title', 'content', 'category_id', 'featured', 'slug'];

    protected $dates = ['deleted_at'];
    // relacija sa kategorijom
    // post može imati samo jednu kategoriju

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
