<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // relacija sa kategorijom
    // post može imati samo jednu kategoriju

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
