@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'BUDGETING INFO')

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
              <li class="breadcrumb-item active"><a href="{{ route('budgets.index') }}">Budget</a></li>
              <li class="breadcrumb-item">Budgeting Info</li>
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

            <form method="POST" action="{{ route('budgets.update',  $data->id) }}" enctype="multipart/form-data">
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
                  <label for="total_budget">TOTAL BUDGET</label>
                  <input type="text" class="form-control" name="total_budget" id="total_budget"
                    placeholder="Add Total Budget" autocomplete="off" value="{{ $data->total_budget }}" readonly>
                  @error('total_budget')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="sources">SOURCES</label>
                  <select name="sources" id="sources" class="form-control" disabled>
                    <option value="#" disabled selected>.: CHOOSE THE SOURCE :.</option>
                    @foreach ($sources as $item)
                    <option value="{{ $item->id }}" {{$item->id==$data->id_source ? 'selected' : ''}}>{{ $item->source_name }}</option>
                    @endforeach
                  </select>
                  @error('sources')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                

                  

              <div class="card-footer">
                
                <a href="{{ route('budgets.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection