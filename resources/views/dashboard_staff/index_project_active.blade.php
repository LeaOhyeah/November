@extends('layout.dashboard')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title', 'Proyek Aktif')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-default-info" role="alert">
            <b> {{ session('success') }} </b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title text-bold">Data Proyek</h3>
            <a class="btn btn-primary float-right" href="{{ route('staff.projectCreate') }}">Tamba Data<i
                    class="fas fa-plus ml-2"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Projek</th>
                        <th>Kota / Kab</th>
                        <th>Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeProjects as $project)
                        <tr>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $project->id) }}">{{ $loop->iteration }}</a></td>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $project->id) }}">{{ $project->name }}</a></td>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $project->id) }}">{{ $project->city->name }}</a></td>
                            <td><a class="text-dark" href="{{ route('staff.projectActive', $project->id) }}">{{ $project->start_date }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Projek</th>
                        <th>Kota / Kab</th>
                        <th>Tanggal Mulai</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('script')
    <!-- DataTables -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
