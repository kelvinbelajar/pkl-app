<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = DB::table('view_date')->get();
        return view('dates.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = DB::table('projects')->get();
        return view('dates.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projects' => 'required',
            'start_project' => 'required',
            'end_project' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'start_project.required' => 'Start Date is required',
            'end_project.required' => 'End Date is required',
            
            
        ]);

        $dates = new Date;
        $dates->id_project = $request->projects;
        $dates->start_project = $request->start_project; 
        $dates->end_project = $request->end_project;
        
        

        $dates->save();
        return redirect()->route('dates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Date::where('id', $id)->first();
        return view('dates.show', compact('data', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Date::where('id', $id)->first();
        return view('dates.edit', compact('data', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dates = Date::findOrFail($id);

        $request->validate([
            'projects' => 'required',
            'start_project' => 'required',
            'end_project' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'start_project.required' => 'Start Date is required',
            'end_project.required' => 'End Date is required',
            
            
        ]);

        $dates->id_project = $request->projects;
        $dates->start_project = $request->start_project; 
        $dates->end_project = $request->end_project;

        $dates->update();
        return redirect()->route('dates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $date = Date::where('id', $id)->first();
        $date->delete();
        return redirect()->route('dates.index');
    }
}
