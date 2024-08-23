@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'ADD EMPLOYEE')

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
              <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">HOME</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('employees.index') }}">Employee Data</a></li>
              <li class="breadcrumb-item">Add Employee data</li>
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

            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="employee_name">Employee Name</label>
                  <input type="text" class="form-control" name="employee_name" id="employee_name"
                    placeholder="Add employee Name" autocomplete="off">
                  @error('employee_name')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="occupation">Occupation</label>
                  <input type="text" class="form-control" name="occupation" id="occupation"
                    placeholder="Add Occupation" autocomplete="off">
                  @error('occupation')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address"
                    placeholder="Add address" autocomplete="off">
                  @error('address')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select name="gender" id="gender" class="form-control">
                    <option value="#" disabled selected>.: Choose Your Gender :.</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Prefer Not To Say">Prefer not to say</option>
                  </select>
                  @error('gender')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" id="phone_number"
                    placeholder="Add phone number" autocomplete="off">
                  @error('phone_number')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email"
                    placeholder="Add email" autocomplete="off">
                  @error('email')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                

                  

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('employees.index') }}" type="button" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection