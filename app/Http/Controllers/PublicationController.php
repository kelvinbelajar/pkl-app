<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = DB::table('view_publication')->get();
        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = DB::table('projects')->get();
        
        $dates = DB::table('dates')->get();
        $locations = DB::table('locations')->get();
        $budgets = DB::table('budgets')->get();
        return view('publication.create', compact('projects', 'dates', 'locations', 'budgets'));
    }

    public function upload(Request $request)
{
    $path = 'laravel-cloudinary';

    if ($request->hasFile('pictures') && $request->file('pictures')->isValid()) {
        $file = $request->file('pictures')->getClientOriginalName();
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $publicId = date('Y-m-d_His') . '_' . $fileName;

        $upload = Cloudinary::upload($request->file('pictures')->getRealPath(), [
            'folder' => $path,
            'public_id' => $publicId
        ]);

        return $upload['secure_url']; // Return the secure URL of the uploaded file
    } else {
        return null; // Return null if file upload fails
    }
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'projects' => 'required',
            'pictures' => 'required',
            'descriptions' => 'required',
            'latitudes' => 'required',
            'longitudes' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'longitudes' => 'required',
            'budgets' => 'required',
            'status' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'pictures.required' => 'Pictures is required',
            
            'descriptions.required' => 'Descriptions is required',
            'latitudes.required' => 'Latitudes is required',
            'longitudes.required' => 'Longitudes is required',
            'datestart.required' => 'Starting Date is required',
            'dateend.required' => 'End Date is required',
            'budgets.required' => 'Budgets is required',
            'status.required' => 'Status is required',
            
            
        ]);

        $publications = new Publication;
        $publications->id_project = $request->projects; 

        $upload = $this->upload($request);
        if ($upload) {
            $publications->picture = $upload;
        } else {
            // Handle case where file upload fails
        }

        $publications->id_project = $request->pictures;



        $publications->id_project = $request->descriptions;
        $publications->id_location = $request->latitudes;
        $publications->id_location = $request->longitudes;
        $publications->id_date = $request->datestart;
        $publications->id_date = $request->dateend;
        $publications->id_budget = $request->budgets;
        $publications->id_project = $request->status;
        
        

        $publications->save();
        return redirect()->route('publications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $data = Publication::where('id', $id)->first();
    $projects = DB::table('projects')->get();
    $dates = DB::table('dates')->get();
    $locations = DB::table('locations')->get();
    $budgets = DB::table('budgets')->get();

    // Fetching the required data from the view_location
    $publications = DB::table('view_publication')
                        ->join('view_location', 'view_publication.project_name', '=', 'view_location.project_name')
                        ->select('view_publication.*', 'view_location.provinsi_name', 'view_location.kota_name', 'view_location.kecamatan_name', 'view_location.kelurahan_name')
                        ->get();

    return view('publication.show', compact('data','projects', 'dates', 'locations', 'budgets', 'publications'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publications = Publication::findOrFail($id);
        
        $request->validate([
            'projects' => 'required',
            'pictures' => 'required',
            'descriptions' => 'required',
            'latitudes' => 'required',
            'longitudes' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'longitudes' => 'required',
            'budgets' => 'required',
            'status' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'pictures.required' => 'Pictures is required',
            
            'descriptions.required' => 'Descriptions is required',
            'latitudes.required' => 'Latitudes is required',
            'longitudes.required' => 'Longitudes is required',
            'datestart.required' => 'Starting Date is required',
            'dateend.required' => 'End Date is required',
            'budgets.required' => 'Budgets is required',
            'status.required' => 'Status is required',
            
            
        ]);

        
        $publications->id_project = $request->projects; 

        $upload = $this->upload($request);
if ($upload) {
    $publications->picture = $upload;
} else {
    // Handle case where file upload fails
}

        $publications->id_project = $request->pictures;



        $publications->id_project = $request->descriptions;
        $publications->id_location = $request->latitudes;
        $publications->id_location = $request->longitudes;
        $publications->id_date = $request->datestart;
        $publications->id_date = $request->dateend;
        $publications->id_budget = $request->budgets;
        $publications->id_project = $request->status;
        
        

        $publications->update();
        return redirect()->route('publications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publication = Publication::where('id', $id)->first();
        $publication->delete();
        return redirect()->route('publications.index');
    }
}
