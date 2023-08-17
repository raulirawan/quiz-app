@extends('layouts.dashboard-admin')

@section('title', 'Halaman Tambah question')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Pertanyaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Pertanyaan</li>
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
                                <h3 class="card-title">Form Tambah question</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('question.store', $quiz->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pertanyaan</label>
                                        <div class="col-sm-10">
                                            <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="question"
                                                placeholder="Pertanyaan">{{ old('question') }}</textarea>
                                            <div class="invalid-feedback">
                                                Masukan Pertanyaan
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilihan</label>
                                        <div class="row" style="margin-left: 0px; margin-right: 0px">
                                            <div class="col-lg-6 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">A</span>
                                                    </div>
                                                    <input type="text" name="choice[]"
                                                        class="form-control @error('choice.0') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Pilihan A"
                                                        value="{{ old('choice.0') }}">

                                                    <div class="invalid-feedback">
                                                        Masukan Pilihan A
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">B</span>
                                                    </div>
                                                    <input type="text" name="choice[]"
                                                        class="form-control @error('choice.1') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Pilihan B"
                                                        value="{{ old('choice.1') }}">

                                                    <div class="invalid-feedback">
                                                        Masukan Pilihan B
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">C</span>
                                                    </div>
                                                    <input type="text" name="choice[]"
                                                        class="form-control @error('choice.2') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Pilihan C"
                                                        value="{{ old('choice.2') }}">

                                                    <div class="invalid-feedback">
                                                        Masukan Pilihan C
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">D</span>
                                                    </div>
                                                    <input type="text" name="choice[]"
                                                        class="form-control @error('choice.3') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Pilihan D"
                                                        value="{{ old('choice.3') }}">

                                                    <div class="invalid-feedback">
                                                        Masukan Pilihan D
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jawaban Benar</label>
                                        <div class="col-sm-10">
                                            <select name="correct_answer" id="correct_answer"
                                                class="form-control @error('correct_answer') is-invalid @enderror">
                                                <option value="">-- Pilih Jawaban Benar --</option>
                                                <option value="a"
                                                    @if (old('correct_answer') == 'a') selected="selected" @endif>
                                                    A
                                                </option>
                                                <option value="b"
                                                    @if (old('correct_answer') == 'b') selected="selected" @endif>
                                                    B
                                                </option>
                                                <option value="c"
                                                    @if (old('correct_answer') == 'c') selected="selected" @endif>
                                                    C
                                                </option>
                                                <option value="d"
                                                    @if (old('correct_answer') == 'd') selected="selected" @endif>
                                                    D
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Jawaban Benar
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
