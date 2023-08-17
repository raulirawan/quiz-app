<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        $question = Question::orderBy('created_at', 'DESC')->where('quiz_id', $quiz->id)->get();
        return view('admin.question.index', compact('quiz', 'question'));
    }

    public function create(Quiz $quiz)
    {
        return view('admin.question.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required',
            'choice' => 'required|array',
            'choice.*' => 'required|string',
            'correct_answer' => 'in:a,b,c,d',
        ]);

        $question = new Question();
        $question->quiz_id = $quiz->id;
        $question->question = $request->question;
        $question->choice = json_encode($request->choice);
        $question->correct_answer = $request->correct_answer;

        if ($question->save()) {
            return redirect()->route('question.index', $quiz->id)->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('question.index', $quiz->id)->with('error', 'Data Gagal di Tambahkan!');
        }
    }

    public function edit(Quiz $quiz, Question $question)
    {
        return view('admin.question.edit', compact('quiz', 'question'));
    }
    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'choice' => 'required|array',
            'choice.*' => 'required|string',
            'correct_answer' => 'in:a,b,c,d',
        ]);

        $question->question = $request->question;
        $question->choice = json_encode($request->choice);
        $question->correct_answer = $request->correct_answer;

        if ($question->save()) {
            return redirect()->route('question.index', $quiz->id)->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('question.index', $quiz->id)->with('error', 'Data Gagal di Update!');
        }
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        if ($question->delete()) {
            return redirect()->route('question.index', $quiz->id)->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('question.index', $quiz->id)->with('error', 'Data Gagal di Hapus!');
        }
    }
}
