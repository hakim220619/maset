@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bs-stepper/bs-stepper.scss', 'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/select2/select2.scss'])
@endsection

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-user-view.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/@form-validation/popular.js', 'resources/assets/vendor/libs/@form-validation/bootstrap5.js', 'resources/assets/vendor/libs/@form-validation/auto-focus.js'])
@endsection

@section('page-script')
    @vite('resources/assets/js/app-bangunan-list.js')
@endsection

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />

<div class="card mb-2">
    <div class="p-4">
        <label for="objectType">Pilih Jenis Objek</label>
        <select id="objectType" class="form-control mb-3">
            <option value="bangunan">Bangunan</option>
            <option value="tanah_kosong">Tanah Kosong</option>
            <option value="retail">Retail</option>
        </select>
        <label for="radius">Pilih Radius (km):</label>
        <select id="radius" class="form-select mb-3">
            <option value="5000">5 km</option>
            <option value="10000" selected>10 km</option>
            <option value="15000">15 km</option>
        </select>
        <div id="map" class="mb-3" style="height: 400px; width: 100%;"></div>
    </div>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Judul Laporan</th>
                <th scope="col">Surveyor</th>
                <th scope="col">Penilai</th>
                <th scope="col">Reviewer</th>
                <th scope="col">Penilai Public</th>
            </tr>
        </thead>
        <tbody>
            @foreach($object as $o)
            <tr>
                <td>{{ $o->nia.'-'.$o->nama_bangunan.'-'.$o->alamat }}</td>
                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>
                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>
                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>
                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>

<script>
    let map = L.map('map').setView([1.966576931124596, 100.049384575934738], 13);
    let accessToken = 'pk.eyJ1IjoicmVkb2syNSIsImEiOiJjbG1zdzZ1Y2MwZHA2MmxxYzdvYm12cTlwIn0.2GTgMV076x87YJQJzM34jg';
    let satelliteLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + accessToken, {
        attribution: '&copy; <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/satellite-streets-v12',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    // Define custom icons for each category
    const blueIcon = new L.Icon({
        iconUrl: '{{ asset('assets/img/icon/location.png') }}',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    const greenIcon = new L.Icon({
        iconUrl: '{{ asset('assets/img/icon/location1.png') }}',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    const yellowIcon = new L.Icon({
        iconUrl: '{{ asset('assets/img/icon/marker.png') }}',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    const defaultIcon = new L.Icon({
        iconUrl: 'path/to/default-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    let radiusCircle = null;
    let markers = [];

    map.on('click', function(e) {
        let selectedRadius = document.getElementById('radius').value;

        if (radiusCircle) {
            map.removeLayer(radiusCircle);
        }

        markers.forEach(marker => map.removeLayer(marker));
        markers = [];

        let latlng = e.latlng;
        radiusCircle = L.circle(latlng, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: selectedRadius // Use selected radius
        }).addTo(map);

        // Filter and add markers within the radius
        let coordinates = @json($coordinates);
        coordinates.forEach(function(location) {
            if (location.lat && location.long) {
                let distance = map.distance(latlng, [location.lat, location.long]);
                if (distance <= selectedRadius) {
                    let icon;
                    if (location.id_category === 1) {
                        icon = blueIcon;
                    } else if (location.id_category === 2) {
                        icon = greenIcon;
                    } else if (location.id_category === 3) {
                        icon = yellowIcon;
                    } else {
                        icon = defaultIcon;
                    }

                    let marker = L.marker([location.lat, location.long], { icon: icon }).addTo(map)
                        .bindPopup('<b>' + location.nama_bangunan + '</b><br>' + location.alamat);
                    markers.push(marker);
                }
            }
        });
    });

    function updateMapAndTable(objectType) {
        $.ajax({
            url: '{{ route('getCoordinates') }}',
            type: 'GET',
            data: {
                object: objectType
            },
            success: function(response) {
                let coordinates = response.coordinates;
                let selectedRadius = document.getElementById('radius').value;

                markers.forEach(marker => map.removeLayer(marker));
                markers = [];

                coordinates.forEach(function(location) {
                    if (location.lat && location.long) {
                        let distance = map.distance(radiusCircle.getLatLng(), [location.lat, location.long]);
                        if (distance <= selectedRadius) {
                            let icon;
                            if (location.id_category === 1) {
                                icon = blueIcon;
                            } else if (location.id_category === 2) {
                                icon = greenIcon;
                            } else if (location.id_category === 3) {
                                icon = yellowIcon;
                            } else {
                                icon = defaultIcon;
                            }

                            let marker = L.marker([location.lat, location.long], { icon: icon }).addTo(map)
                                .bindPopup('<b>' + location.nama_bangunan + '</b><br>' + location.alamat);
                            markers.push(marker);
                        }
                    }
                });

                let objectTableBody = '';
                response.object.forEach(function(o) {
                    objectTableBody += '<tr>' +
                        '<td>' + o.nia + '-' + o.nama_bangunan + '-' + o.alamat + '</td>' +
                        '<td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>' +
                        '<td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>' +
                        '<td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>' +
                        '<td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z"/></svg></td>' +
                        '</tr>';
                });

                $('#objectTableBody').html(objectTableBody);
            },
            error: function(error) {
                console.error('Error fetching coordinates:', error);
            }
        });
    }

    $('#objectType').change(function() {
        let objectType = $(this).val();
        updateMapAndTable(objectType);
    });

    $('#radius').change(function() {
        let objectType = $('#objectType').val();
        updateMapAndTable(objectType);
    });
</script>
@endsection
