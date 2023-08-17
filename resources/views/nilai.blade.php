@extends('layouts.app')
@section('title', 'Halaman Nilai')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">Hasil</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">NILAI</h5>
                            <p class="card-text">
                            <h2>{{ $leaderboard->poin }}</h2>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>
            <a href="{{ route('leaderboard', $leaderboard->quiz_id) }}" class="btn btn-success btn-logout">Lihat
                Leaderboard</a>
        </div>
    </div>


@endsection
