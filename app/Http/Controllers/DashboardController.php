<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = DB::table('view_publication')
        ->join('view_location', 'view_publication.project_name', '=', 'view_location.project_name')
        ->select('view_publication.*', 'view_location.provinsi_name', 'view_location.kota_name', 'view_location.kecamatan_name', 'view_location.kelurahan_name')
        ->get();

        $view_laporans = DB::table('view_publication')->get();
        return view('dashboard', compact('view_laporans', 'publications'));
    }

    /**
     * Show Maps
     */
    public function maps()
    {
        $view_laporans = DB::table('view_publication')->get();
        return view('laporan.maps', compact('view_laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
