<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::orderBy('created_at', 'DESC')->get();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materi.create');
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
            'name' => 'required|string',
            'content' => 'required',
        ]);

        $materi = new Materi();
        $materi->name = $request->name;
        $materi->content = $request->content;

        if ($materi->save()) {
            return redirect()->route('materi.index')->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('materi.index')->with('error', 'Data Gagal di Tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'name' => 'required|string',
            'content' => 'required',
        ]);

        $materi->name = $request->name;
        $materi->content = $request->content;

        if ($materi->save()) {
            return redirect()->route('materi.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('materi.index')->with('error', 'Data Gagal di Update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        if ($materi->delete()) {
            return redirect()->route('materi.index')->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('materi.index')->with('error', 'Data Gagal di Hapus!');
        }
    }
}
