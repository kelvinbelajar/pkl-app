@extends('pages.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'LOCATION')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('judul_halaman')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">HOME</a></li>
                        <li class="breadcrumb-item">Location
                        <li>
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
                <a href="{{ route('locations.create') }}" type="button" class="btn btn-primary mb-3">Tambah Data</a>
                <a href="{{ route('cetakLocation') }}" target="_blank" type="button" class="btn btn-success mb-3"><i
                        class="bi bi-printer"></i></a>

                @php
                    // Array of month names in Indonesian
                    $months = [
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ];
                @endphp

                <form action="{{ route('cetakMonthlyLocations') }}" target="_blank" method="GET" class="form-inline mb-3">
                    <div class="form-group">
                        <label for="month" class="mr-2">Bulan:</label>
                        <select name="month" id="month" class="form-control mr-3">
                            @foreach ($months as $monthNumber => $monthName)
                                <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year" class="mr-2">Tahun:</label>
                        <select name="year" id="year" class="form-control mr-3">
                            @foreach (range(date('Y'), date('Y') - 10) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Laporan Bulanan</button>
                </form>
                <table id="locations" class="table table-bordered  table-striped mb-3">
                    <thead>
                        <tr align="center">
                            <th>NO</th>
                            <th>Project</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $data)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->project_name }}</td>
                                <td>{{ $data->provinsi_name }}</td>
                                <td>{{ $data->kota_name }}</td>
                                <td>{{ $data->kecamatan_name }}</td>
                                <td>{{ $data->kelurahan_name }}</td>
                                <td>{{ $data->latitude }}</td>
                                <td>{{ $data->longitude }}</td>

                                <td>
                                    <a href="{{ route('locations.show', $data->id) }}"> <button
                                            class="btn btn-light m-2"><i class="bi bi-eye-fill"></i></button></a>
                                    <a href="{{ route('locations.edit', $data->id) }}"> <button
                                            class="btn btn-secondary m-2"><i class="bi bi-pencil-square"></i></button></a>
                                    <a href="{{ route('cetakLocationById', $data->id) }}" target="_blank" type="button"
                                        class="btn btn-success m-2"><i class="bi bi-printer"></i></a>
                                    <form action="{{ route('locations.destroy', $data->id) }}" method="POST"
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
