@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'SHOW PROJECT')

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
              <li class="breadcrumb-item active"><a href="{{ route('projects.index') }}">Project</a></li>
              <li class="breadcrumb-item">Show Project</li>
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

            <form method="POST" action="{{ route('projects.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                
             
              <div class="card-body">
                <div class="form-group">
                  <label for="project_name">Project Name</label>
                  <input type="text" class="form-control" name="project_name" id="project_name"
                    placeholder="Add Project Name" autocomplete="off" value="{{ $data->project_name }}" readonly>
                  @error('project_name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="project_goal">Project Goal</label>
                  <input type="text" class="form-control" name="project_goal" id="project_goal"
                    placeholder="Add Project Goal" autocomplete="off" value="{{ $data->project_goal }}" readonly>
                  @error('project_goal')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="performance_metric">Performance Metric</label>
                    <input type="text" class="form-control" name="performance_metric" id="performance_metric"
                      placeholder="Add Performance Metric" autocomplete="off" value="{{ $data->performance_metric }}" readonly>
                    @error('performance_metric')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="project_status">Project Status</label>
                    <input type="text" class="form-control" value="{{ $data->project_status}}" readonly>
                    
                    @error('project_status')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                

                <div class="form-group">
                  <label for="picture">Picture</label>
                  <br>
                    @if ($data->picture)
                    <img src="{{ $data->picture }}" alt="Picture" width="100" height="100">
                  @endif
                  @error('picture')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                      placeholder="Add Description" autocomplete="off" value="{{ $data->description }}" readonly>
                    @error('description')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>
  
              <div class="card-footer">
                <a href="{{ route('projects.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection