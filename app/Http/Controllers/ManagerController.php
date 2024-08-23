<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = DB::table('view_manager')->get();
        return view('manager.index', compact('managers'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = DB::table('projects')->get();
        return view('manager.create', compact('projects'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projects' => 'required',
            'manager_name' => 'required',
            'manager_contact' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'manager_name.required' => 'Manager name is required',
            'manager_contact.required' => 'Manager contact is required',
            
            
        ]);

        $managers = new Manager;
        $managers->id_project = $request->projects;
        $managers->manager_name = $request->manager_name; 
        $managers->manager_contact = $request->manager_contact;
        
        

        $managers->save();
        return redirect()->route('managers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Manager::where('id', $id)->first();
        return view('manager.show', compact('data', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = DB::table('projects')->get();
        $data = Manager::where('id', $id)->first();
        return view('manager.edit', compact('data', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $managers = Manager::findOrFail($id);

        $request->validate([
            'projects' => 'required',
            'manager_name' => 'required',
            'manager_contact' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'manager_name.required' => 'Manager name is required',
            'manager_contact.required' => 'Manager contact is required',
            
            
        ]);

        
        $managers->id_project = $request->projects;
        $managers->manager_name = $request->manager_name; 
        $managers->manager_contact = $request->manager_contact;
        
        

        $managers->update();
        return redirect()->route('managers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $manager = Manager::where('id', $id)->first();
        $manager->delete();
        return redirect()->route('managers.index');
    }
}
