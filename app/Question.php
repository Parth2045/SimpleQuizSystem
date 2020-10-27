<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function answer(){
        return $this->hasMany(Question::class);
    }
}
