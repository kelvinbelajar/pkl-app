@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'ADD PROJECT PUBLICATIONS')

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
              <li class="breadcrumb-item active"><a href="{{ route('publications.index') }}">Project Publications</a></li>
              <li class="breadcrumb-item">Add Project Publications </li>
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

            <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
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
                  <label for="pictures">PICTURE</label>
                  <select name="pictures" id="pictures" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE PROJECT :.</option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}">{{ $item->picture }}</option>
                    @endforeach
                  </select>
                  @error('pictures')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="descriptions">DESCRIPTION</label>
                  <select name="descriptions" id="descriptions" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE PROJECT :.</option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}">{{ $item->description }}</option>
                    @endforeach
                  </select>
                  @error('descriptions')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="latitudes">LATITUDE</label>
                  <select name="latitudes" id="latitudes" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE LATITUDE :.</option>
                    @foreach ($locations as $item)
                      <option value="{{ $item->id }}">{{ $item->latitude }}</option>
                    @endforeach
                  </select>
                  @error('latitudes')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="longitudes">LONGITUDE</label>
                  <select name="longitudes" id="longitudes" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE LONGITUDE :.</option>
                    @foreach ($locations as $item)
                      <option value="{{ $item->id }}">{{ $item->longitude }}</option>
                    @endforeach
                  </select>
                  @error('longitudes')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="datestart">date</label>
                  <select name="datestart" id="datestart" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE START DATE :.</option>
                    @foreach ($dates as $item)
                      <option value="{{ $item->id }}">{{ $item->start_project }}</option>
                    @endforeach
                  </select>
                  @error('datestart')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="dateend">date</label>
                  <select name="dateend" id="dateend" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE END DATE :.</option>
                    @foreach ($dates as $item)
                      <option value="{{ $item->id }}">{{ $item->end_project }}</option>
                    @endforeach
                  </select>
                  @error('dateend')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="budgets">BUDGETS</label>
                  <select name="budgets" id="budgets" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE TOTAL BUDGET :.</option>
                    @foreach ($budgets as $item)
                      <option value="{{ $item->id }}">{{ $item->total_budget }}</option>
                    @endforeach
                  </select>
                  @error('budgets')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="status">STATUS</label>
                  <select name="status" id="projects" class="form-control">
                    <option value="#" disabled selected>.: CHOOSE THE PROJECT STATUS :.</option>
                    @foreach ($projects as $item)
                      <option value="{{ $item->id }}">{{ $item->project_status }}</option>
                    @endforeach
                  </select>
                  @error('status')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                

                

                  

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('publications.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection