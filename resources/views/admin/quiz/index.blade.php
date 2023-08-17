@extends('layouts.dashboard-admin')

@section('title', 'Halaman Quiz')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Quiz</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="{{ route('quiz.create') }}" class="btn btn-primary mb-2">(+) Tambah
                                    Quiz</a>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5px">No</th>
                                            <th>Nama</th>
                                            <th>Materi</th>
                                            <th style="width: 30%">Opsi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($quiz as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->materi->name }}</td>
                                                <td>
                                                    <a id="leaderboard" data-toggle="modal" data-target="#rankingModal"
                                                        class="btn btn-success badge" data-quiz_id="{{ $item->id }}"
                                                        data-quiz_name="{{ $item->name }}"
                                                        style='float: left; padding-left: 5px; margin-top: 4px; margin-right: 5px'>Leaderboard</a>
                                                    <a href="{{ route('question.index', $item->id) }}"
                                                        class="btn btn-primary badge"
                                                        style='float: left; padding-left: 5px; margin-top: 4px; margin-right: 5px'>Pertanyaan</a>
                                                    <a href="{{ route('quiz.edit', $item->id) }}" class="btn btn-info badge"
                                                        style='float: left; padding-left: 5px; margin-top: 4px'>Edit</a>
                                                    <form action="{{ route('quiz.destroy', $item->id) }}"
                                                        style='float: left; padding-left: 5px;' method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger badge"
                                                            onclick="return confirm('Yakin ?')">Hapus</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="rankingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leaderboard Quiz - <span id="title-quiz">TEs</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Poin</th>
                            </tr>
                        </thead>
                        <tbody id="body-leaderboard">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('down-script')
    <script>
        $(document).ready(function() {
            $("#leaderboard").click(function(e) {
                var quizId = $(this).data('quiz_id');
                var quizName = $(this).data('quiz_name');
                $("#title-quiz").text(quizName);
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: `/admin/leaderboard/${quizId}`,
                    success: function(data) {
                        var html = '';
                        $.each(data, function(index, value) {
                            html += `
                            <tr>
                                <th scope="row">${index+1}</th>
                                <td>${value.user.name}</td>
                                <td>${value.poin}</td>
                            </tr>
                        `;
                        });
                        $("#body-leaderboard").append(html);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
