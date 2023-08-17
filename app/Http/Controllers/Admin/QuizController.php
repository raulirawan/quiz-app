<?php

namespace App\Http\Controllers\Admin;

use App\Quiz;
use App\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::orderBy('created_at', 'DESC')->get();
        return view('admin.quiz.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materi = Materi::all();
        return view('admin.quiz.create', compact('materi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materi,id',
            'name' => 'required|string',
        ]);

        $quiz = new Quiz();
        $quiz->materi_id = $request->materi_id;
        $quiz->name = $request->name;

        if ($quiz->save()) {
            return redirect()->route('quiz.index')->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('quiz.index')->with('error', 'Data Gagal di Tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $materi = Materi::all();
        return view('admin.quiz.edit', compact('materi', 'quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'materi_id' => 'required|exists:materi,id',
            'name' => 'required|string',
        ]);
        $quiz->materi_id = $request->materi_id;
        $quiz->name = $request->name;
        if ($quiz->save()) {
            return redirect()->route('quiz.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('quiz.index')->with('error', 'Data Gagal di Update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        if ($quiz->delete()) {
            return redirect()->route('quiz.index')->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('quiz.index')->with('error', 'Data Gagal di Hapus!');
        }
    }
}
