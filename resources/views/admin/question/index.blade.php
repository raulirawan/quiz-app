@extends('layouts.dashboard-admin')

@section('title', 'Halaman Question')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Question</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Question</li>
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
                                <h3 class="card-title">Data Question - {{ $quiz->materi->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="{{ route('question.create', $quiz->id) }}" class="btn btn-primary mb-2">(+) Tambah
                                    Question</a>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5px">No</th>
                                            <th>Pertanyaan</th>
                                            <th style="width: 15%">Opsi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($question as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->question }}</td>
                                                <td>
                                                    {{-- <button data-toggle="modal" data-target="#exampleModal"
                                                        class="btn btn-success badge"
                                                        style='float: left; padding-left: 5px; margin-top: 4px;'>Detail</button> --}}
                                                    <a href="{{ route('question.edit', [$quiz->id, $item->id]) }}"
                                                        class="btn btn-info badge"
                                                        style='float: left; padding-left: 5px; margin-top: 4px'>Edit</a>
                                                    <form action="{{ route('question.destroy', [$quiz->id, $item->id]) }}"
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

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">

                        {{-- <tr>
                            <th style="width: 200px">Pertanyaan</th>
                            <td>wdww</td>
                        </tr>
                        <tr>
                            <th style="width: 200px" rowspan="4">Pertanyaan</th>
                            <td>dw</td>
                            <td>dw</td>
                            <td>dw</td>
                            <td>dw</td>
                        </tr> --}}
                        <tr>
                            <td>Pertannyaan</td>
                            <td>Tes</td>
                        </tr>
                        <tr>
                            <td rowspan="4">TEs</td>
                            <td>dwdw</td>
                        </tr>
                        <tr>
                            <td>dww</td>
                        </tr>
                        <tr>
                            <td>wdw</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('down-script')
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
