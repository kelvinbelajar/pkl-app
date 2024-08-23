@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'ADD PROJECT DATE')

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
              <li class="breadcrumb-item active"><a href="{{ route('dates.index') }}">Project Date</a></li>
              <li class="breadcrumb-item">Add Project Date</li>
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

            <form method="POST" action="{{ route('dates.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="projects">PROJECTS</label>
                  <select name="projects" id="projects" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE PROJECT :.</option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}">{{ $item->project_name }}</option>
                    @endforeach
                  </select>
                  @error('projects')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="start_project">Start Date</label>
                  <input type="date" class="form-control" name="start_project" id="start_project"
                    placeholder="Add Start Date" autocomplete="off">
                  @error('start_project')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="end_project">End Date</label>
                  <input type="date" class="form-control" name="end_project" id="end_project"
                    placeholder="Add End Date" autocomplete="off">
                  @error('end_project')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                

                  

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('dates.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection