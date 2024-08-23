<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = DB::table('view_location')->get();
        
        return view('location.index', compact('locations'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('location.contoh');
        $projects = DB::table('projects')->get();
        return view('location.create', compact('projects'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projects' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'provinsi_id.required' => 'Provinsi is required',
            'kota_id.required' => 'Kota is required',
            'kecamatan_id.required' => 'Kecamatan is required',
            'kelurahan_id.required' => 'Kelurahan is required',
            'latitude.required' => 'Latitude is required',
            'longitude.required' => 'Longitude is required',
            
            
        ]);

        $locations = new Location;
        $locations->id_project = $request->projects;
        $locations->provinsi_id = $request->provinsi_id; 
        $locations->kota_id = $request->kota_id;
        $locations->kecamatan_id = $request->kecamatan_id;
        $locations->kelurahan_id = $request->kelurahan_id;
        $locations->latitude = $request->latitude;
        $locations->longitude = $request->longitude;

        

        $locations->save();
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Location::where('id', $id)->first();
        $projects = DB::table('projects')->get();
        $locations = DB::table('view_location')->get();
        return view('location.show', compact('data', 'projects', 'locations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $data = Location::where('id', $id)->first();
        $projects = DB::table('projects')->get();
        $locations = DB::table('view_location')->get();
        return view('location.edit', compact('data', 'projects', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $locations = Location::findOrFail($id);
        $request->validate([
            'projects' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'provinsi_id.required' => 'Provinsi is required',
            'kota_id.required' => 'Kota is required',
            'kecamatan_id.required' => 'Kecamatan is required',
            'kelurahan_id.required' => 'Kelurahan is required',
            'latitude.required' => 'Latitude is required',
            'longitude.required' => 'Longitude is required',
            
            
        ]);

       
        $locations->id_project = $request->projects;
        $locations->provinsi_id = $request->provinsi_id; 
        $locations->kota_id = $request->kota_id;
        $locations->kecamatan_id = $request->kecamatan_id;
        $locations->kelurahan_id = $request->kelurahan_id;
        $locations->latitude = $request->latitude;
        $locations->longitude = $request->longitude;

        

        $locations->update();
        return redirect()->route('locations.index');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::where('id', $id)->first();
        $location->delete();
        return redirect()->route('locations.index');
    }
}
