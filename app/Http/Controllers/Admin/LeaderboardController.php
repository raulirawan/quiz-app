<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function getLeaderBoard($quizId)
    {
        $leaderboard = Leaderboard::with(['user', 'quiz'])->where('quiz_id', $quizId)->limit(10)->get();

        return response()->json($leaderboard, 200);
    }
}
