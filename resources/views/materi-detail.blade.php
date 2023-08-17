@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">{{ $materi->name }}</h3>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-book"></i>
                            <article>
                                {!! $materi->content !!}

                            </article>
                            @if (!empty($quiz))
                                <a href="{{ route('quiz.detail', $quiz->id) }}" class="btn btn-success btn-quiz">Mulai
                                    Kuis</a>
                            @else
                                <a href="{{ route('materi') }}" class="btn btn-danger btn-quiz">Quiz Belum Tersedia</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
