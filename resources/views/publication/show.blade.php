@extends('pages.main')

@section('judul_halaman', 'LOCATION PROJECT')

@section('content')
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('judul_halaman')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">HOME</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('locations.index') }}">Location Project</a></li>
                        <li class="breadcrumb-item">Location Project</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@yield('judul_halaman')</h3>
                    </div>

                    <form method="POST" `action="{{ route('publications.update', $data->id) }}" enctype="multipart/form-data">
                      @csrf
        
                        <div class="card-body">
                          <div class="form-group">
                            <label for="projects">PROJECTS</label>
                            <select name="projects" id="projects" class="form-control" disabled>
                              <option value="#" disabled selected>.: CHOOSE THE PROJECT :.</option>
                              @foreach ($projects as $item)
                                <option value="{{ $item->id }}" {{$item->id==$data->id_project ? 'selected' : ''}}>{{ $item->project_name }}</option>
                              @endforeach
                            </select>
                            @error('projects')
                              <div class="alert alert-danger mt-2">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>

                          

                          
                            <div class="form-row">
                              <div class="form-group">
                                <label for="latitudes">LATITUDE</label>
                                <select name="latitudes" id="latitudes" class="form-control">
                                  <option value="#" disabled selected>.: CHOOSE THE LATITUDE :.</option>
                                  @foreach ($locations as $item)
                                  <option value="{{ $item->id }}" {{$item->id==$data->id_location ? 'selected' : ''}}>{{ $item->latitude }}</option>
                                  @endforeach
                                </select>
                                @error('latitudes')
                                  <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                                <div class="col-md-6">
                                  <label for="longitudes">LATITUDE</label>
                                  <select name="longitudes" id="longitudes" class="form-control">
                                    <option value="#" disabled selected>.: CHOOSE THE LATITUDE :.</option>
                                    @foreach ($locations as $item)
                                    <option value="{{ $item->id }}" {{$item->id==$data->id_location ? 'selected' : ''}}>{{ $item->longitude }}</option>
                                    @endforeach
                                  </select>
                                  @error('longitudes')
                                  <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                  </div>
                                @enderror
                                </div>
                            </div>
                                

                            <br>
                            <div id="mapid" style="height: 400px;"></div>
                            <br>
            
                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var latitude = parseFloat(document.getElementById('latitudes').value);
    var longitude = parseFloat(document.getElementById('longitudes').value);
    var mymap = L.map('mapid').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
    }).addTo(mymap);

    @foreach ($publications as $publication)
    L.marker([{{ $publication->latitude }}, {{ $publication->longitude }}]).addTo(mymap)
        .bindPopup("<p>PROJECT: {{ $publication->project_name }}</p>" +
                   "<p>Provinsi: {{ $publication->provinsi_name }}</p>" +
                   "<p>Kota: {{ $publication->kota_name }}</p>" +
                   "<p>Kecamatan: {{ $publication->kecamatan_name }}</p>" +
                   "<p>Kelurahan: {{ $publication->kelurahan_name }}</p>" +
                   "<img src='{{ $publication->picture }}' alt='Picture' style='width: 110px; height: 110px;'>")
        .openPopup();
@endforeach


</script>

                        </div>

                        <div class="card-footer">
                            
                            <a href="{{ route('locations.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
