@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">Home</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Selamat Datang</h5>
                            <p class="card-text">
                            <h2>{{ ucwords(Auth::user()->name) }}</h2>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a href="{{ route('materi') }}">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="bi bi-book"></i>

                                <p class="card-text">Materi</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="{{ route('quiz') }}">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="bi bi-calendar-check"></i>

                                <p class="card-text">Quiz</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            <a class="btn btn-danger btn-logout" href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>


@endsection
