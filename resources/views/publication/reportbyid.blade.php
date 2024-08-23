<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>{{ $judul }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      font-family: Calibri, sans-serif;
      padding: 20px;
      font-size: 14px;
    }

    .sheet {
      padding: 15mm;
      position: relative;
      min-height: 297mm; /* Adjust this value based on your page size (e.g., A4) */
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100px;
      height: auto;
      float: left;
      margin-right: 10px;
    }

    .header .left-align {
      text-align: left;
    }

    h1 {
      font-size: 18px;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: transparent;
      font: normal 13px Arial, sans-serif;
      margin-top: 10px;
    }

    table th,
    table td {
      border: none;
      padding: 8px;
      text-align: center;
    }

    table thead th {
      background-color: #DDEFEF;
      color: #336B6B;
    }

    table tbody tr:nth-child(even) {
      background-color: rgba(221, 238, 239, 0.5);
    }

    table tbody tr:nth-child(odd) {
      background-color: rgba(221, 238, 239, 0.3);
    }

    strong {
      font-weight: bold;
    }

    img {
      max-width: 150px;
      max-height: 150px;
      display: block;
      margin: auto;
    }

    .separator {
      border-top: 2px solid #000;
      margin: 20px 0;
    }

    .footer {
      position: absolute;
      bottom: 15mm;
      right: 15mm;
      width: auto;
      text-align: right;
    }

    .footer p {
      margin: 0;
    }

    .page-break {
      page-break-before: always;
    }
  </style>
</head>

<body>
  <section class="sheet">
    <!-- Header/Kop Surat -->
    <div class="header">
      <!-- Logo -->
      <img src="{{ public_path('dist/img/download.png') }}" alt="LOGO DINAS">

      <!-- Informasi Organisasi -->
      <div class="left-align">
        <h2 style="margin: 0; font-size: 18px;"><b>BAPPEDA LITBANG KOTA BANJARMASIN</b></h2>
        <p style="margin: 2px 0;">Jalan R.E. Martadinata No.1 - Komplek Perkantoran Balai Kota Banjarmasin - Gedung Blok C - Lantai II - III</p>
        <p style="margin: 2px 0;">Kelurahan Kertak Baru Ilir, Kecamatan Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70111</p>
        <p style="margin: 2px 0;">Telepon: (0511) 3355 665 | Email: barenlitbangda@gmail.com</p>
      </div>
      <!-- Clearfix untuk mengatasi float -->
      <div style="clear: both;"></div>
      <hr style="border-top: 2px solid black; margin-top: 5px; margin-bottom: 5px;">
    </div>

  
    <h1 style="text-align: center;">LAPORAN DATA PUBLICATION</h1>
    @if ($publications->count() > 0)
      @foreach ($publications as $data)
        <table>
          <tr>
            <th class="text-center align-middle">Project Name</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->project_name }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Picture</th>
            <td>:</td>
            <td class="text-center align-middle"><img src="{{ $data->picture }}" alt="Picture"></td>
          </tr>
          <tr>
            <th class="text-center align-middle">Description</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->description }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Latitude</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->latitude }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Longitude</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->longitude }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Start Project</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->start_project }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">End Project</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->end_project }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Total Budget</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->total_budget }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Project Status</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->project_status }}</td>
          </tr>
        </table>
        <div class="separator"></div>
      @endforeach
    @else
      <p class="text-center">DATA NOT FOUND</p>
    @endif

    <!-- Footer -->
    <div class="footer">
      <p>
        Banjarmasin,
        <?php
        // Array mapping English day names to Indonesian
        $dayNames = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];
        // Array mapping English month names to Indonesian
        $monthNames = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];
        // Get current date and time
        $currentDate = date('l, d F Y');
        // Translate day and month names to Indonesian
        foreach ($dayNames as $english => $indonesian) {
            $currentDate = str_replace($english, $indonesian, $currentDate);
        }
        foreach ($monthNames as $english => $indonesian) {
            $currentDate = str_replace($english, $indonesian, $currentDate);
        }
        echo $currentDate;
        ?>
        <br>Mengetahui
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </p>
      <p class="left-align">
        <b><u>Drs. Ahmad Syauqi, M. Si.</u></b>
      </p>
    </div>
  </section>
</body>

</html>
