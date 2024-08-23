@extends('pages.main')

@section('judul_halaman', 'DASHBOARD')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    /* General styling */
    .container {
        padding-top: 20px; /* Adjust distance from navbar */
    }

    /* Map styling */
    #map {
        height: 500px; /* Adjust height as needed */
        margin-top: 50px; /* Add margin to push content down */
    }

    .map-container {
        margin-top: 20px; /* Add margin to push content down */
        position: relative; /* Make sure container is positioned relative */
    }

    .map-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Button styling */
    .profile-btn {
        position: absolute;
        top: 20px; /* Adjust distance from top */
        left: 20px; /* Adjust distance from left */
    }

    .profile-btn button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 8px;
    }

    .profile-btn button:hover {
        background-color: #45a049;
    }

    /* Logout button styling */
    .logout-btn {
        position: absolute;
        top: 20px; /* Adjust distance from top */
        right: 20px; /* Adjust distance from right */
    }
</style>

<div class="container">
    <div class="container-fluid map-container">
        <h1 class="map-title"  style="font-size: 22px"><b>RENCANA PEMBANGUNAN JANGKA PANJANG (RPJP) DAERAH KOTA BANJARMASIN</b></h1>
        
        <div id="map"></div>
        <div class="profile-btn">
            <button onclick="window.location.href='{{ route('profile.edit') }}'">{{ __('Profile') }}</button>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger" >
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M17 8h4l-4 -4m0 8h4l-4 4m-5 3v-14h-6" />
                </svg>
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Initialize the map
    var map = L.map('map').setView([-3.324882, 114.590111], 13);

    // Add the base OpenStreetMap layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Define your tagged locations
    var taggedLocations = {!! json_encode($publications) !!};

    // Add markers for each tagged location
    taggedLocations.forEach(location => {
        var marker = L.marker([location.latitude, location.longitude]).addTo(map);
        marker.bindPopup('<h3>' + location.project_name + '</h3>' +
            '<p>Provinsi: ' + location.provinsi_name + '</p>' +
            '<p>Kota: ' + location.kota_name + '</p>' +
            '<p>Kecamatan: ' + location.kecamatan_name + '</p>' +
            '<p>Kelurahan: ' + location.kelurahan_name + '</p>' +
            '<p><img src="' + location.picture + '" alt="Bukti Pelanggaran" width="100" height="100"></p>');
    });
</script>

@endsection
