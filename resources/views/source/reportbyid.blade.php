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
      margin: 5mm; /* Reduced margin to fit more content */
    }
  </style>
  <style>
    body {
      font-family: Calibri, sans-serif;
      margin: 0;
      padding: 0;
    }

    .sheet {
      padding: 10mm; /* Reduced padding to maximize space */
      position: relative;
      min-height: 297mm; /* Adjust this value based on your page size (e.g., A4) */
      box-sizing: border-box;
    }

    .header {
      text-align: center;
      margin-bottom: 10px; /* Reduced margin for the header */
    }

    h1 {
      font-size: 18px; /* Keeping the font size unchanged */
      margin-top: 10px; /* Reduced margin */
    }

    .table {
      background-color: transparent;
      font: normal 13px Arial, sans-serif; /* Keeping font size unchanged */
      width: 100%;
      margin-top: 10px; /* Reduced margin */
      border-collapse: collapse;
    }

    .table th,
    .table td {
      border: none;
      padding: 8px; /* Reduced padding */
      text-align: center;
      text-shadow: 1px 1px 1px #fff;
    }

    .table thead th {
      background-color: #DDEFEF;
      color: #336B6B;
    }

    .table tbody tr:nth-child(even) {
      background-color: rgba(221, 238, 239, 0.5);
    }

    .table tbody tr:nth-child(odd) {
      background-color: rgba(221, 238, 239, 0.3);
    }

    .left-align {
      text-align: left;
    }

    .footer {
      position: absolute;
      bottom: 10mm; /* Adjusted bottom position */
      right: 10mm; /* Adjusted right position */
      width: auto;
      text-align: right;
    }

    .footer p {
      margin: 0;
    }

    .separator {
      border-top: 2px solid #000;
      margin: 10px 0; /* Reduced margin to fit more content */
    }

    .page-break {
      page-break-before: auto;
    }
  </style>
</head>

<body>
  <section class="sheet">
    <!-- Header/Kop Surat -->
    <div class="header">
      <!-- Logo -->
      <img src="{{ public_path('dist/img/download.png') }}" alt="LOGO DINAS"
        style="width: 100px; height: auto; float: left; margin-right: 10px;">

      <!-- Informasi Organisasi -->
      <div class="left-align">
        <h2 style="margin: 0; font-size: 18px;"><b>BAPPEDA LITBANG KOTA BANJARMASIN</b></h2>
        <p style="margin: 2px 0;">Jalan R.E. Martadinata No.1 - Komplek Perkantoran Balai Kota Banjarmasin - Gedung Blok C - Lantai II - III</p>
        <p style="margin: 2px 0;">Kelurahan Kertak Baru Ilir, Kecamatan Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70111</p>
        <p style="margin: 2px 0;">Telepon: (0511) 3355 665 | Email: barenlitbangda@gmail.com</p>
      </div>
      <!-- Clearfix untuk mengatasi float -->
      <div style="clear: both;"></div>
      <hr style="border-top: 2px solid black; margin-top: 5px; margin-bottom: 5px;"> <!-- Reduced hr size -->
    </div>

    <h1 style="text-align: center;">LAPORAN DATA SOURCE</h1>

    @if ($sources->count() > 0)
      @foreach ($sources as $data)
        <table class="table">
          <tr>
            <th class="text-center align-middle">Project</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->pn }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Source Name</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->source_name }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Source Manager</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->source_manager }}</td>
          </tr>
          <tr>
            <th class="text-center align-middle">Source Email</th>
            <td>:</td>
            <td class="text-center align-middle">{{ $data->source_email }}</td>
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
