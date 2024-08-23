@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'ADD SOURCE FUNDS')

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
              <li class="breadcrumb-item active"><a href="{{ route('sources.index') }}">Source Funds</a></li>
              <li class="breadcrumb-item">Add Source Funds</li>
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

            <form method="POST" action="{{ route('sources.store') }}" enctype="multipart/form-data">
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
                  <label for="source_name">Organization Name</label>
                  <input type="text" class="form-control" name="source_name" id="source_name"
                    placeholder="Add Organization Name" autocomplete="off">
                  @error('source_name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="source_manager">Organization Manager Name</label>
                  <input type="text" class="form-control" name="source_manager" id="source_manager"
                    placeholder="Add Organization Manager Name" autocomplete="off">
                  @error('source_manager')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="source_email">Source Organization Email</label>
                  <input type="text" class="form-control" name="source_email" id="source_email"
                    placeholder="Add Source Organization Email" autocomplete="off">
                  @error('source_email')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                  

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('sources.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection