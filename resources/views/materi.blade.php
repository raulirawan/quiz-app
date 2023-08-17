@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">Materi</h3>
        <div class="container">
            <div class="row">
                @foreach ($materi as $item)
                    <div class="col-6">
                        <a href="{{ route('materi.detail', $item->id) }}" style="color: #000">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="bi bi-book"></i>
                                    <p class="card-text">{{ $item->name }}</p>
                                </div>
                        </a>
                    </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>

@endsection
