<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    public function quiz()
    {
        return $this->belongTo(Quiz::class, 'quiz_id', 'id');
    }
}
