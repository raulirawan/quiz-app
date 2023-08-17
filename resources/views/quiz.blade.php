@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">Quiz</h3>
        <div class="container">
            <div class="row">
                @foreach ($quiz as $item)
                    <div class="col-6">
                        <a href="{{ route('quiz.detail', $item->id) }}">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-calendar-check"></i>
                                    <p class="card-text">{{ $item->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
