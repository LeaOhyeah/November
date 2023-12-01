@extends('layout.dashboard')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

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
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('project.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card card-primary collapsed-card">

                    <div class="card-header py-3">
                        <h3 class="card-title text-bold">Project {{ $project->name }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select name="city_id" id="city_id" class="form-control select2" style="width: 100%;">
                                        <option>Pilih Kota</option>
                                        @foreach ($cities as $city)
                                            @if (old('city_id', $project->city_id) == $city->id)
                                                <option value="{{ $city->id }}" selected="selected">{{ $city->name }}
                                                </option>
                                            @endif
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget">Anggaran</label>
                                    <input value="{{ old('budget', $project->budget) }}" type="number"
                                        class="form-control" id="budget" name="budget">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input name="start_date" value="{{ $project->start_date }}" type="date"
                                        class="form-control " data-target="#reservationdate" />
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Nama Proyek</label>
                                    <input value="{{ old('name', $project->name) }}" type="text" class="form-control"
                                        id="name" name="name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" style="width: 100%;">
                                        @if (old('status', $project->status) == '0')
                                            <option value="0">Aktif</option>
                                        @elseif (old('status', $project->status) == '1')
                                            <option value="1">Non Aktif</option>
                                        @elseif (old('status', $project->status) == '2')
                                            <option value="1">Selesai</option>
                                        @else
                                            <option value="0">Aktif</option>
                                            <option value="1">Non Aktif</option>
                                            <option value="1">Selesai</option>
                                        @endif
                                        <option>Selesai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea id="description" class="form-control" rows="7" name="description">{{ old('description', $project->description) }}</textarea>
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

        <div class="col-md-6">
            <form action="{{ route('projectdetail.store') }}" method="POST">
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
                                        class="form-control " data-target="#reservationdate" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea id="description" class="form-control" rows="7" name="description_detail">{{ old('description_detail') }}</textarea>
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

    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img class="img-fluid pad" src="../dist/img/photo2.png" alt="Photo">

            <p>I took this photo this morning. What do you guys think?</p>
            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
            <span class="float-right text-muted">127 likes - 3 comments</span>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" id="button-kecil">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <div id="kecil" class="card collapsed-card">
                <div class="card-body">
                    <div class="direct-chat-messages">

                        @for ($index = 1; $index < 19; $index++)
                            <div class="direct-chat-msg mt-2">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg"
                                    alt="Message User Image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                        @endfor


                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments">

        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                </div>
            </form>
        </div>
        <!-- /.card-footer -->
    </div>

    <div class="card card-widget collapsed-card">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img class="img-fluid pad" src="../dist/img/photo2.png" alt="Photo">

            <p>I took this photo this morning. What do you guys think?</p>
            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
            <span class="float-right text-muted">127 likes - 3 comments</span>
        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments">
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Maria Gonzales
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Luna Stark
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                </div>
            </form>
        </div>
        <!-- /.card-footer -->
    </div>

    <div class="card card-widget collapsed-card">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img class="img-fluid pad" src="../dist/img/photo2.png" alt="Photo">

            <p>I took this photo this morning. What do you guys think?</p>
            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
            <span class="float-right text-muted">127 likes - 3 comments</span>
        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments">
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Maria Gonzales
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Luna Stark
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                </div>
            </form>
        </div>
        <!-- /.card-footer -->
    </div>

    <div class="card card-widget collapsed-card">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img class="img-fluid pad" src="../dist/img/photo2.png" alt="Photo">

            <p>I took this photo this morning. What do you guys think?</p>
            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
            <span class="float-right text-muted">127 likes - 3 comments</span>
        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments">
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Maria Gonzales
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
            <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                    <span class="username">
                        Luna Stark
                        <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.card-comment -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                </div>
            </form>
        </div>
        <!-- /.card-footer -->
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

    <script>
        document.getElementById('button-kecil').addEventListener('click', function() {
            // Mengambil elemen card kecil berdasarkan ID
            var cardKecil = document.getElementById('kecil');

            // Memeriksa apakah card kecil sudah memiliki class collapsed-card
            if (cardKecil.classList.contains('collapsed-card')) {
                // Jika iya, hapus class tersebut
                cardKecil.classList.remove('collapsed-card');
            } else {
                // Jika tidak, tambahkan class tersebut
                cardKecil.classList.add('collapsed-card');
            }
        });
    </script>
@endpush
