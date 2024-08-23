@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'EMPLOYEE INFORMATIONS')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('judul_halaman')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">HOME</a></li>
            <li class="breadcrumb-item">Employee Information</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="card">

      <div class="card-header">
        <h3 class="card-title">@yield('judul_halaman')</h3>
      </div>

      <div class="card-body">
        <a href="{{ route('employees.create') }}" type="button" class="btn btn-primary mb-3">Tambah Data</a>
        <table id="employees" class="table table-bordered  table-striped mb-3">
          <thead>
            <tr align="center">
              <th>NO</th>
              <th>Employee Name</th>
              <th>Occupation</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Aksi</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $data)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->employee_name }}</td>
                <td>{{ $data->occupation }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->phone_number }}</td>
                <td>{{ $data->email }}</td>
                
                <td>
                  <a href="{{ route('employees.show', $data->id) }}"> <button class="btn btn-light m-2"><i
                        class="bi bi-eye-fill"></i></button></a>
                  <a href="{{ route('employees.edit', $data->id) }}"> <button class="btn btn-secondary m-2"><i
                        class="bi bi-pencil-square"></i></button></a>
                  <form action="{{ route('employees.destroy', $data->id) }}" method="POST"
                    onsubmit="return confirm('Apakah yakin menghapus data ini?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-2"><i class="bi bi-trash-fill"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection