@extends('layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        #map {
            height: 400px;
            min-width: 100%;
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
        }

        .floating-button {
            position: absolute;
            right: 20px;
            bottom: 20px;
            z-index: 999;
        }

        .floating-text-custom {
            position: absolute;
            right: absolute;
            margin-left: 10px;
            bottom: 20px;
            z-index: 999;
        }
    </style>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-default-info" role="alert">
            <b> {{ session('success') }} </b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-default-danger" role="alert">
            <b> {{ session('error') }} </b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
        </div>
    @elseif (count($errors))
        <div class="alert alert-default-danger" role="alert">
            <b>Terjadi kesalahan </b>
            <b>{{ $errors->first() }} </b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
        </div>
    @endif

    <div class="row">
        {{-- update project --}}
        <div class="col-md-6">
            <form action="{{ route('staff.projectUpdate', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card card-primary collapsed-card">

                    <div class="card-header py-3">
                        <h3 class="card-title text-bold">Project {{ $project->name }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">edit <i
                                    class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- provinsi --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="province_id" id="province_id" class="form-control select2"
                                        style="width: 100%;">
                                        <option selected="selected">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            @if (old('province_id', $project->city->province_id) == $province->id)
                                                <option value="{{ $province->id }}" selected="selected">
                                                    {{ $province->name }}
                                                </option>
                                            @endif
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- kota --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select name="city_id" id="city_id"
                                        class="form-control @error('city_id') is-invalid @enderror select2"
                                        style="width: 100%;">
                                        <option>Pilih Kota</option>
                                        @foreach ($cities as $city)
                                            @if (old('city_id', $project->city_id) == $city->id)
                                                <option value="{{ $city->id }}" selected="selected">
                                                    {{ $city->name }}
                                                </option>
                                            @endif
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget">Anggaran</label>
                                    <input value="{{ old('budget', $project->budget) }}" type="number"
                                        class="form-control @error('budget') is-invalid @enderror" id="budget"
                                        name="budget">
                                    @error('budget')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input name="start_date" value="{{ $project->start_date }}" type="date"
                                        class="form-control @error('start_date') is-invalid @enderror "
                                        data-target="#reservationdate" />
                                    @error('start_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Nama Proyek</label>
                                    <input value="{{ old('name', $project->name) }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" style="width: 100%;">
                                        @if (old('status', $project->status) == '0')
                                            <option selected value="0">Aktif</option>
                                            <option value="1">Non Aktif</option>
                                            <option value="2">Selesai</option>
                                        @elseif (old('status', $project->status) == '1')
                                            <option value="0">Aktif</option>
                                            <option selected value="1">Non Aktif</option>
                                            <option value="2">Selesai</option>
                                        @elseif (old('status', $project->status) == '2')
                                            <option value="0">Aktif</option>
                                            <option value="1">Non Aktif</option>
                                            <option selected value="2">Selesai</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="7"
                                        name="description">{{ old('description', $project->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="lat" value="{{ $project->lat }}" name="lat"
                                placeholder="Enter Latitude">
                            <input type="hidden" id="long" value="{{ $project->long }}" name="long"
                                placeholder="Enter Longitude">

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
            <div id="map"><button class="btn btn-sm btn-info border-dark floating-button" id="myLocation"
                    type="button">Lokasi
                    Saya</button>
                <b class="floating-text-custom">Simpan Jika Melakukan Perubahan*</b>
            </div>
        </div>

        {{-- create detail project --}}
        <div class="col-md-6">
            <form action="{{ route('staff.projectdetailStore') }}" method="POST">
                @csrf
                <div class="card card-primary">

                    <div class="card-header py-3">
                        <h3 class="card-title text-bold">Tambah Detail Project {{ $project->name }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <input name="project_id" value="{{ $project->id }}" type="hidden">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Diperbarui</label>
                                    <input name="update_date" value="{{ old('update_date_detail') }}" type="date"
                                        class="form-control  @error('update_date') is-invalid @enderror"
                                        data-target="#reservationdate" />
                                    @error('update_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea id="description" class="form-control @error('description_detail') is-invalid @enderror" rows="7"
                                        name="description_detail">{{ old('description_detail') }}</textarea>
                                    @error('description_detail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Tambah Detail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                        <th>Diunggah Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->project_detail as $detail)
                        <tr>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $detail->id) }}">{{ $loop->iteration }}</a>
                            </td>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $detail->id) }}">{{ $project->name }}
                                    {{ $detail->update_date }}</a>
                            </td>
                            <td><a class="text-dark"
                                    href="{{ route('staff.projectActive', $detail->id) }}">{{ $detail->created_at }} WIB</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Projek</th>
                        <th>Diunggah Pada</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection


@push('script')
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js">
    </script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    {{-- <script src="{{ asset('leaflet/leaflet.js') }}"></script> --}}
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    {{-- map --}}
    <script>
        // inisialisasi map
        // var map = L.map('map').setView([-0.79021988479697, 118.92346179551438], 5);
        var map = L.map('map').setView([{{ $project->lat }}, {{ $project->long }}], 8); // sesuai data

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // marker {sesuai data}
        var initialLatLng = [{{ $project->lat }}, {{ $project->long }}];
        var marker = L.marker(initialLatLng, {
            draggable: true
        }).addTo(map);
        // end marker

        // get data lat & long dari marker
        marker.on('drag', function(event) {
            var coordinate = marker.getLatLng();
            $('#lat').val(coordinate.lat);
            $('#long').val(coordinate.lng);
            marker.bindPopup("Pilih Lokasi Baru").openPopup();
        });

        function setMarkerToCurrentLocation() {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                marker.setLatLng([latitude, longitude]);
                marker.bindPopup("Lokasi Anda").openPopup();
                map.setView([latitude, longitude], 14);
                $('#lat').val(latitude);
                $('#long').val(longitude);
            });
        }
        document.getElementById('myLocation').addEventListener('click', function() {
            setMarkerToCurrentLocation();
        });

        // inisialisasi geocoder
        var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false,
        }).addTo(map);
        // end inisialisasi geocoder
        // function return geocoder
        geocoder.on('markgeocode', function(event) {
            var result = event.geocode;
            var latlng = result.center;
            marker.setLatLng([latlng.lat, latlng.lng]);
            $('#lat').val(latlng.lat);
            $('#long').val(latlng.lng);
            marker.bindPopup("Lokasi Pencarian").openPopup();
            map.setView([latlng.lat, latlng.lng], 14);
        });
        // end function return geocoder


        $(document).ready(function() {
            $('#province_id').change(function() {
                var provinceId = $(this).val();

                $.ajax({
                    url: '/get-cities',
                    method: 'GET',
                    data: {
                        province_id: provinceId
                    },
                    success: function(data) {
                        $('#city_id').empty();
                        $('#city_id').append('<option value="">Pilih Kota</option>');

                        $.each(data, function(index, city) {
                            $('#city_id').append('<option value="' + city.id + '">' +
                                city.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    {{-- date picker --}}
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L',
            locale: 'id',
            language: 'id', // Kode bahasa untuk Indonesia
        });
    </script>

    {{-- select --}}
    <script>
        $(function() {
            //Initialize Select2 Elements
            //   $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#createCommentBtn').on('click', function(e) {
                e.preventDefault();

                // Menampilkan modal konfirmasi jika diperlukan

                // Mendapatkan nilai dari input komentar
                var commentBody = $('#commentBodyInput').val();

                // Kirim permintaan AJAX untuk membuat komentar
                $.ajax({
                    type: 'POST',
                    url: '{{ route('userComment.store') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "body": commentBody,
                        "project_detail_id": "{{ count($project->project_detail) ? $project->project_detail[0]->id : null }} ",
                        "user_id": "1", // catatan
                    },
                    success: function(response) {
                        // Tambahkan logika untuk menampilkan komentar baru tanpa me-refresh halaman
                        console.log('Komentar berhasil dibuat:', response);

                        // Menambahkan komentar ke tampilan secara dinamis
                        var newComment = '<div class="direct-chat-msg mt-2 hapus-item-' +
                            response.data.id + '">' +
                            '<div class="direct-chat-infos clearfix">' +
                            '<span class="direct-chat-name float-left">Nama Pengguna</span>' +
                            '<span class="direct-chat-timestamp float-right">' + response.data
                            .created_at + '</span>' +
                            '</div>' +
                            '<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">' +
                            '<div class="direct-chat-text comment-item">' +
                            response.data.body +
                            '<div class="d-flex justify-content-between">' +
                            '<a class="text-dark delete-comment" data-id="' + response
                            .data.id + '">' +
                            '<i class="float-right fas fa-trash"></i>' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('.target-baru').append(newComment);

                        // Mengosongkan input komentar setelah berhasil membuat komentar
                        $('#commentBodyInput').val('');

                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).data('id');

            $.ajax({
                type: 'DELETE',
                url: '/user/comment/delete/' + commentId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    // Hapus komentar dari tampilan secara dinamis
                    $('.hapus-item-' + commentId).remove();
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>

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
