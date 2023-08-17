@extends('layouts.dashboard-admin')

@section('title', 'Halaman Edit Quiz')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Quiz</li>
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
                                <h3 class="card-title">Form Edit quiz</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('quiz.update', $quiz->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Quiz</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="inputEmail3"
                                                placeholder="Nama Quiz" value="{{ $quiz->name }}">
                                            <div class="invalid-feedback">
                                                Masukan Nama Quiz
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Materi</label>
                                        <div class="col-sm-10">
                                            <select name="materi_id" id="materi_id"
                                                class="form-control @error('materi_id') is-invalid @enderror">
                                                <option value="">-- Pilih Materi --</option>
                                                @foreach ($materi as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($quiz->materi_id == $item->id) selected="selected" @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Materi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
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
@endsection
@push('down-script')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush
