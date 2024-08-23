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

                    <form method="POST" action="{{ route('locations.update',  $data->id) }}" enctype="multipart/form-data">
                      @csrf
                        @method('PUT')
        
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
                                <div class="col-md-6">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $data->latitude }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $data->longitude }}" readonly>
                                </div>
                            </div>

                            <br>
                            <div id="mapid" style="height: 400px;"></div>
                            <br>
            
                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                            <script>
                              var latitude = parseFloat(document.getElementById('latitude').value);
                              var longitude = parseFloat(document.getElementById('longitude').value);
                              var mymap = L.map('mapid').setView([latitude, longitude], 13);
            
                              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
                              }).addTo(mymap);
                              
                              @foreach ($locations as $location)
                              L.marker([latitude, longitude]).addTo(mymap)
                                .bindPopup("<b>{{ $location->project_name }}</b>" + "<p>Kota: {{ $location->kota_name }}</p>" +
                                  "<p>Kecamatan : {{ $location->kecamatan_name }}</p>" + "<p>Kelurahan : {{ $location->kelurahan_name }}</p>" ).openPopup();
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
