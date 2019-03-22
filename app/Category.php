<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relacija postova sa kategorijama
    // $this se ovdje odnosi na klasu Category

    public function posts() {

        return $this->hasMany(Post::class);
    }
}
