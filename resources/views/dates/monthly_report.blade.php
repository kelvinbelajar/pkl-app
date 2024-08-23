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
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody tr {
            page-break-inside: avoid;
            /* Tambahkan ini */
        }

        .left-align {
            text-align: left;
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
                <p style="margin: 5px 0;">Jalan R.E. Martadinata No.1 - Komplek Perkantoran Balai Kota Banjarmasin -
                    Gedung Blok C - Lantai II - III</p>
                <p style="margin: 5px 0;">Kelurahan Kertak Baru Ilir, Kecamatan Banjarmasin Tengah, Kota Banjarmasin,
                    Kalimantan Selatan 70111</p>
                <p style="margin: 5px 0;">Telepon: (0511) 3355 665 | Email: barenlitbangda@gmail.com</p>
            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
        </div>

        <h1 style="text-align: center;">LAPORAN DATA TANGGAL BULANAN</h1>
        <h1 style="text-align: center;">{{ $bulan }}, {{ $tahun }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Project</th>
                    <th>Start Project Date</th>
                    <th>End Project Date</th>
                </tr>
            </thead>
            <tbody>
                @if ($dates->count() > 0)
                    @foreach ($dates as $data)
                        <tr align="center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->project->project_name }}</td>
                            <td>{{ $data->start_project }}</td>
                            <td>{{ $data->end_project }}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">DATA NOT FOUND</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <div class="left-align" style="float: right; width: 45%;">
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
                </p>
                <br>
                <br>
                <p class="left-align">
                    <b><u>Drs. Ahmad Syauqi, M. Si.</u></b>
                </p>
            </div>
        </div>

    </section>

</body>

</html>
