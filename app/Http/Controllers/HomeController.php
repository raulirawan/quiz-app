<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Answer;
use App\Materi;
use App\Question;
use App\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function materi()
    {
        $materi = Materi::all();
        return view('materi', compact('materi'));
    }
    public function materiDetail($materiId)
    {
        $materi = Materi::findOrFail($materiId);

        $quiz = Quiz::where('materi_id', $materi->id)->first();

        return view('materi-detail', compact('materi', 'quiz'));
    }

    public function quiz()
    {
        $quiz = Quiz::all();
        return view('quiz', compact('quiz'));
    }

    public function quizDetail($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('quiz-detail', compact('quiz'));
    }

    public function submitAnswer(Request $request)
    {
        $question = $request->question_id;

        $totalQuestion = count($question);

        $correctAnswerPoint = 100 / $totalQuestion;
        $point = 0;
        foreach ($question as $key => $value) {

            $correntAnswer = Question::select('correct_answer')->where('id', $value)->first()->correct_answer;
            $answer = new Answer();
            $userAnswer = $request->{'answer_' . $value};
            $answer->user_id = Auth::user()->id;
            $answer->question_id = $value;
            $answer->answer = $userAnswer;
            $answer->save();

            if ($userAnswer == $correntAnswer) {
                $point += $correctAnswerPoint;
            }
        }
        $quizId = $request->quiz_id;
        // insert to leaderboard
        $leaderboard = new Leaderboard();
        $leaderboard->user_id = Auth::user()->id;
        $leaderboard->quiz_id = $quizId;
        $leaderboard->poin = round($point);
        $leaderboard->save();

        return redirect()->route('nilai', [$quizId, Auth::user()->id]);
    }

    public function nilai($quizId, $userId)
    {
        $leaderboard = Leaderboard::where(['quiz_id' => $quizId, 'user_id' => $userId])->orderBy('created_at', 'DESC')->first();

        return view('nilai', compact('leaderboard'));
    }

    public function leaderboard($quizId)
    {
        $quiz = Quiz::where('id', $quizId)->first();
        $leaderboard = Leaderboard::orderBy('poin', 'DESC')->get()->unique('user_id');
        return view('leaderboard', compact('leaderboard', 'quiz'));
    }
}
