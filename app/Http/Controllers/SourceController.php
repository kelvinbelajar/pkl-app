<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = DB::table('view_source')->get();
        return view('source.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = DB::table('projects')->get();
        return view('source.create', compact('projects'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projects' => 'required',
            'source_name' => 'required',
            'source_manager' => 'required',
            'source_email' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'source_name.required' => 'Organization name is required',
            'source_manager.required' => 'Organization manager is required',
            'source_email.required' => 'Organization email is required',
            
            
        ]);

        $sources = new Source;
        $sources->id_project = $request->projects;
        $sources->source_name = $request->source_name; 
        $sources->source_manager = $request->source_manager;
        $sources->source_email = $request->source_email;
        
        

        $sources->save();
        return redirect()->route('sources.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Source::findOrFail($id);
        $sources = DB::table('view_source')->get()->where('id', $id)->first();
        return view('source.show', compact('data', 'sources', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Source::where('id', $id)->first();
        return view('source.edit', compact('data', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sources = Source::findOrFail($id);

        $request->validate([
            'projects' => 'required',
            'source_name' => 'required',
            'source_manager' => 'required',
            'source_email' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'source_name.required' => 'Organization name is required',
            'source_manager.required' => 'Organization manager is required',
            'source_email.required' => 'Organization email is required',
            
            
        ]);

        
        $sources->id_project = $request->projects;
        $sources->source_name = $request->source_name; 
        $sources->source_manager = $request->source_manager;
        $sources->source_email = $request->source_email;
        
        

        $sources->update();
        return redirect()->route('sources.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $source = Source::where('id', $id)->first();
        $source->delete();
        return redirect()->route('sources.index');
    }
}
