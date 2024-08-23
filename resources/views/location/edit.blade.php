@extends('pages.main')

@section('judul_halaman', 'EDIT LOCATION PROJECT')

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
                        <li class="breadcrumb-item">Edit Location Project</li>
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
                            <select name="projects" id="projects" class="form-control">
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
                                <div class="form-group col-md-3">
                                  <label for="select2-provinsi">Provinsi</label>
                                  <select name="provinsi_id" class="form-control select2-data-array browser-default"
                                    id="select2-provinsi"></select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="select2-kabupaten">Kabupaten / Kota</label>
                                  <select name="kota_id" class="form-control select2-data-array browser-default"
                                    id="select2-kabupaten" value=$data->kota_id></select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="select2-kecamatan">Kecamatan</label>
                                  <select name="kecamatan_id" class="form-control select2-data-array browser-default"
                                    id="select2-kecamatan"></select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="select2-kelurahan">Kelurahan / Desa</label>
                                  <select name="kelurahan_id" class="form-control select2-data-array browser-default"
                                    id="select2-kelurahan"></select>
                                </div>
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
            

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('locations.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
