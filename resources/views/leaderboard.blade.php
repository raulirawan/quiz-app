@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <h3 class="text-center">Leaderboard</h3>
        <h3 class="text-center">{{ $quiz->name }}</h3>
        <div class="container" style="margin-top: 0; margin-bottom: 20px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">NILAI</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($leaderboard as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ ucwords($item->user->name) }}</td>
                                            <td>{{ $item->poin }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
