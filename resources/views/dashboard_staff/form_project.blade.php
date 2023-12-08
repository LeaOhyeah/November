@extends('layout.dashboard')
@section('css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" /> --}}

    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}">
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
    </style>
@endsection

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-default-danger" role="alert">
            <b> {{ session('error') }} </b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">&times;</span> </button>
        </div>
    @endif

    <form action="{{ route('staff.storeProject') }}" method="POST">
        @csrf
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title text-bold">Tambah Proyek Baru</h3>
            </div>

            <div class="card-body">
                <div class="row">

                    {{-- provinsi --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="province_id" id="province_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    @if (old('province_id') == $province->id)
                                        <option value="{{ $province->id }}" selected="selected">{{ $province->name }}
                                        </option>
                                    @endif
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- kota --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kabupaten / Kota</label>
                            <select name="city_id" id="city_id"
                                class="form-control @error('city_id') is-invalid @enderror select2" style="width: 100%;">
                                <option value="">Pilih Kota</option>
                                @foreach ($cities as $city)
                                    @if (old('city_id') == $city->id)
                                        <option value="{{ $city->id }}" selected="selected">{{ $city->name }}
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

                    {{-- anggaran --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="budget">Anggaran</label>
                            <input value="{{ old('budget') }}" type="number"
                                class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget">
                            @error('budget')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- nama --}}
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Nama Proyek</label>
                            <input value="{{ old('name') }}" type="text"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    {{-- tanggal mulai --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input name="start_date" value="{{ old('start_date') }}" type="text"
                                    class="form-control @error('start_date') is-invalid @enderror datetimepicker-input "
                                    data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- status --}}
                    <input type="hidden" value="0" name="status">

                    {{-- deskripsi --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="7"
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="hidden" class="@error('lat') is-invalid @enderror" id="lat" name="lat"
                                placeholder="Enter Latitude">
                            <input type="hidden" id="long" name="long" placeholder="Enter Longitude">
                            @error('lat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div id="map"><button class="btn btn-info border-dark floating-button" id="myLocation"
                                type="button">Lokasi Saya</button>
                        </div>

                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary float-left text-bold">Simpan</button>
                <a href="{{ route('staff.projectsActive') }}" class="btn btn-secondary float-right">Kembali</a>
            </div>
        </div>
    </form>
@endsection


@push('script')
    <!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js">
    </script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> --}}
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        // inisialisasi map
        var map = L.map('map').setView([-0.79021988479697, 118.92346179551438], 5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // inisialisasi marker
        var initialLatLng = [-0.79021988479697, 118.92346179551438];
        var marker = L.marker(initialLatLng, {
            draggable: true
        }).addTo(map);

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

                        $.each(data, function(index, city) {
                            $('#city_id').append('<option value="' + city.id + '">' +
                                city.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L',
            locale: 'id',
            language: 'id', // Kode bahasa untuk Indonesia
        });
    </script>

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
@endpush
