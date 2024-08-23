<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>{{ $judul }}</title>
  
  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style type="text/css" media="print">
    @page {
      size: auto;
      /* auto is the initial value */
      margin: 0mm;
      /* this affects the margin in the printer settings */
    }
  </style>
  <style>
    body {
      font-family: Calibri, sans-serif;
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

    h1 {
      font-size: 18px;
      margin-top: 20px;
    }

    .table {
      background-color: transparent;
      /* Membuat latar belakang tabel menjadi transparan */
      font: normal 13px Arial, sans-serif;
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
      /* Menghilangkan batas antar sel */
    }

    .table th,
    .table td {
      border: none;
      /* Menghilangkan batas pada sel */
      padding: 10px;
      text-align: center;
      text-shadow: 1px 1px 1px #fff;
    }

    .table thead th {
      background-color: #DDEFEF;
      color: #336B6B;
    }

    .table tbody tr:nth-child(even) {
      background-color: rgba(221, 238, 239, 0.5);
      /* Memberi warna latar belakang transparan untuk baris-genap */
    }

    .table tbody tr:nth-child(odd) {
      background-color: rgba(221, 238, 239, 0.3);
      /* Memberi warna latar belakang transparan untuk baris-ganjil */
    }

    .left-align {
      text-align: left;
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
      <img src="{{ public_path('dist/img/download.png') }}" alt="LOGO DINAS"
        style="width: 120px; height: auto; float: left; margin-right: 30px;">

      <!-- Informasi Organisasi -->
      <div class="left-align">
        <h2 style="margin: 0; font-size: 18px;"><b>BAPPEDA LITBANG KOTA BANJARMASIN</b></h2>
        <p style="margin: 5px 0;">Jalan R.E. Martadinata No.1 - Komplek Perkantoran Balai Kota Banjarmasin - Gedung Blok C - Lantai II - III</p>
        <p style="margin: 5px 0;">Kelurahan Kertak Baru Ilir, Kecamatan Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70111</p>
        <p style="margin: 5px 0;">Telepon: (0511) 3355 665 | Email: barenlitbangda@gmail.com</p>
      </div>
      <!-- Clearfix untuk mengatasi float -->
      <div style="clear: both;"></div>
      <br>
      <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
    </div>

    <h1 style="text-align: center;">LAPORAN DATA PROJECT</h1>
@if ($projects->count() > 0)
  @foreach ($projects as $data)
    <table class="table">
      <tr>
        <th class="text-center align-middle">Project Name</th>
        <td>:</td>
        <td class="text-center align-middle">{{ $data->project_name }}</td>
      </tr>
      <tr>
        <th class="text-center align-middle">Project Goal</th>
        <td>:</td>
        <td class="text-center align-middle">{{ $data->project_goal }}</td>
      </tr>
      <tr>
        <th class="text-center align-middle">Project Metric</th>
        <td>:</td>
        <td class="text-center align-middle">{{ $data->performance_metric }}</td>
      </tr>
      <tr>
        <th class="text-center align-middle">Project Status</th>
        <td>:</td>
        <td class="text-center align-middle">{{ $data->project_status }}</td>
      </tr>
      <tr>
        <th class="text-center align-middle">Picture</th>
        <td>:</td>
        <td class="text-center align-middle">
          <img src="{{ $data->picture }}" alt="Picture" width="100px" height="100px">
        </td>
      </tr>
      <tr>
        <th class="text-center align-middle">Description</th>
        <td>:</td>
        <td class="text-center align-middle">{{ $data->description }}</td>
      </tr>
    </table>
    <div class="separator"></div>
  @endforeach
@else
  <p class="text-center">DATA NOT FOUND</p>
@endif

    <!-- Page Break -->
    <div class="page-break"></div>

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
