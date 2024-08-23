@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'SOURCE FUNDS')

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
              <li class="breadcrumb-item">Source Funds</li>
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

            <form method="POST" action="{{ route('sources.update',  $data->id) }}" enctype="multipart/form-data">
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

                <div class="form-group">
                  <label for="source_name">Organization Name</label>
                  <input type="text" class="form-control" name="source_name" id="source_name"
                    placeholder="Add Organization Name" autocomplete="off"  value="{{ $data->source_name }}" readonly>
                  @error('source_name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="source_manager">Organization Manager Name</label>
                  <input type="text" class="form-control" name="source_manager" id="source_manager"
                    placeholder="Add Organization Manager Name" autocomplete="off"  value="{{ $data->source_manager }}" readonly>
                  @error('source_manager')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="source_email">Source Organization Email</label>
                  <input type="text" class="form-control" name="source_email" id="source_email"
                    placeholder="Add Source Organization Email" autocomplete="off"  value="{{ $data->source_email }}" readonly>
                  @error('source_email')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                  

              <div class="card-footer">
                
                <a href="{{ route('sources.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection