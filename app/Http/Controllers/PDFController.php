<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Date;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Manager;
use App\Models\Publication;
use App\Models\Source;

class PDFController extends Controller
{
    public function cetakProjects()
    {
        $projects = DB::table('projects')->select('*')->get();
        $data = [
            'projects' => $projects,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Project'
        ];

        $report = PDF::loadView('project.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyProjects(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $projects = DB::table('projects')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'projects' => $projects,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Project Bulanan'
        ];

        $report = PDF::loadView('project.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakProjectById($id)
    {

        $projects = DB::table('projects')->select('*')->where('id', $id)->get();
        $data = [
            'projects' => $projects,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Project By ID'
        ];

        $report = PDF::loadView('project.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakManagers()
    {
        $managers = DB::table('view_manager')->select('*')->get();
        $data = [
            'managers' => $managers,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Manager'
        ];

        $report = PDF::loadView('manager.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyManagers(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $managers = Manager::with('project')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'managers' => $managers,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Manager Bulanan'
        ];

        $report = PDF::loadView('manager.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakManagerById($id)
    {

        $managers = DB::table('view_manager')->select('*')->where('id', $id)->get();
        $data = [
            'managers' => $managers,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Manager By ID'
        ];

        $report = PDF::loadView('manager.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakLocations()
    {
        $locations = DB::table('view_location')->select('*')->get();
        $data = [
            'locations' => $locations,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Location'
        ];

        $report = PDF::loadView('location.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyLocations(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $locations = DB::table('view_location')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'locations' => $locations,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Lokasi Bulanan'
        ];

        $report = PDF::loadView('location.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakLocationById($id)
    {
        $locations = DB::table('view_location')->select('*')->where('id', $id)->get();
        $data = [
            'locations' => $locations,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Location By ID'
        ];

        $report = PDF::loadView('location.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakSources()
    {
        $sources = DB::table('view_source')->select('*')->get();
        $data = [
            'sources' => $sources,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Source'
        ];

        $report = PDF::loadView('source.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlySources(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $sources = Source::with('project')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'sources' => $sources,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Source Bulanan'
        ];

        $report = PDF::loadView('source.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }


    public function cetakSourceById($id)
    {
        $sources = DB::table('view_source')->select('*')->where('id', $id)->get();
        $data = [
            'sources' => $sources,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Source By ID'
        ];

        $report = PDF::loadView('source.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakBudgets()
    {
        $budgets = DB::table('view_budget')->select('*')->get();
        $data = [
            'budgets' => $budgets,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Budget'
        ];

        $report = PDF::loadView('budget.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyBudgets(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $budgets = Budget::with('project','source')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'budgets' => $budgets,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Budget Bulanan'
        ];

        $report = PDF::loadView('budget.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakBudgetById($id)
    {
        $budgets = DB::table('view_budget')->select('*')->where('id', $id)->get();
        $data = [
            'budgets' => $budgets,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Budget By ID'
        ];

        $report = PDF::loadView('budget.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakDates()
    {
        $dates = DB::table('view_date')->select('*')->get();
        $data = [
            'dates' => $dates,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Date'
        ];

        $report = PDF::loadView('dates.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyDates(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $dates = Date::with('project')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'dates' => $dates,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Tanggal Bulanan'
        ];

        $report = PDF::loadView('dates.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakDateById($id)
    {
        $dates = DB::table('view_date')->select('*')->where('id', $id)->get();
        $data = [
            'dates' => $dates,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Date By ID'
        ];

        $report = PDF::loadView('dates.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakPublications()
    {
        $publications = DB::table('view_publication')->select('*')->get();
        $data = [
            'publications' => $publications,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Publication'
        ];

        $report = PDF::loadView('publication.report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    //CETAK BULANAN
    public function cetakMonthlyPublications(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

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
            12 => 'Desember'
        ];
        $bulan = $months[$month];

        $publications = Publication::with('project','location','date','budget')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $data = [
            'publications' => $publications,
            'bulan' => $bulan,
            'tahun' => $year,
            'judul' => 'Laporan Data Publikasi Bulanan'
        ];

        $report = PDF::loadView('publication.monthly_report', $data)->setPaper('A4', 'landscape');
        $nama_tgl = date('dmY');
        $nama_jam = date('His');

        return $report->stream('monthly_report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function cetakPublicationById($id)
    {
        $publications = DB::table('view_publication')->select('*')->where('id', $id)->get();
        $data = [
            'publications' => $publications,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Publication By ID'
        ];

        $report = PDF::loadView('publication.reportbyid', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }
}
