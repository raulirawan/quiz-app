<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id', 'id');
    }

    public function question()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    // public function leaderboard()
    // {
    //     return $this->hasMany(Leaderboard::class, 'quiz_id', 'id')->orderBy('poin','DESC')->limit(10);
    // }

    public function leaderboard()
    {
        return $this->hasMany(Leaderboard::class, 'quiz_id', 'id')->orderBy('poin','DESC')->limit(10);
    }
}
