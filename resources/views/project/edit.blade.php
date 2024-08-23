@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'EDIT PROJECT')

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
              <li class="breadcrumb-item">Edit Project</li>
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
                @method('PUT')
             
              <div class="card-body">
                <div class="form-group">
                  <label for="project_name">Project Name</label>
                  <input type="text" class="form-control" name="project_name" id="project_name"
                    placeholder="Add Project Name" autocomplete="off" value="{{ $data->project_name }}">
                  @error('project_name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="project_goal">Project Goal</label>
                  <input type="text" class="form-control" name="project_goal" id="project_goal"
                    placeholder="Add Project Goal" autocomplete="off" value="{{ $data->project_goal }}">
                  @error('project_goal')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="performance_metric">Performance Metric</label>
                    <input type="text" class="form-control" name="performance_metric" id="performance_metric"
                      placeholder="Add Performance Metric" autocomplete="off" value="{{ $data->performance_metric }}">
                    @error('performance_metric')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="project_status">Project Status</label>
                    <select name="project_status" id="project_status" class="form-control">
                        <option value="#" disabled>.: Choose the Project Status :.</option>
                        <option value="Planning" {{ $data->project_status == 'Planning' ? 'selected' : '' }}>Planning</option>
                        <option value="Running" {{ $data->project_status == 'Running' ? 'selected' : '' }}>Running</option>
                        <option value="Finished" {{ $data->project_status == 'Finished' ? 'selected' : '' }}>Finished</option>
                    </select>
                    @error('project_status')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                

                <div class="form-group">
                  <label for="picture">Picture</label>
                  <input type="file" class="form-control" name="picture"
                    id="picture" accept="image/*" multiple>
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
                      placeholder="Add Description" autocomplete="off" value="{{ $data->description }}">
                    @error('description')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('projects.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection