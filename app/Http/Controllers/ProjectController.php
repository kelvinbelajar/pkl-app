<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'ASC')->get();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    public function upload(Request $request)
    {
        $path = 'laravel-cloudinary';
        $file = $request->file('picture')->getClientOriginalName();

        $fileName = pathinfo($file, PATHINFO_FILENAME);

        $publicId = date('Y-m-d_His') . '_' . $fileName;
        $upload = Cloudinary::upload($request->file('picture')->getRealPath(), [
            'folder' => $path,
            'public_id' => $publicId
        ]);

        return $upload;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'project_goal' => 'required',
            'performance_metric' => 'required',
            'project_status' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ],
        [
            'project_name.required' => 'Project name is required',
            'project_goal.required' => 'Project goal is required',
            'performance_metric.required' => 'Performance metric is required',
            'project_status.required' => 'Project status is required',
            'picture.required' => 'Picture is required',
            'picture.image' => 'Picture must be an image',
            'picture.mimes' => 'Pictures must be in jpeg, png, jpg, gif format',
            'picture.max' => 'Maximum picture size is 2MB',
            'description.required' => 'Description is required',
        ]);

        $projects = new Project;
        $projects->project_name = $request->project_name; 
        $projects->project_goal = $request->project_goal;
        $projects->performance_metric = $request->performance_metric;
        $projects->project_status = $request->project_status;
        $upload = $this->upload($request);
        $projects->picture = $upload->getSecurePath();
        $projects->description = $request->description;

        $projects->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Project::where('id', $id)->first();
        return view('project.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Project::where('id', $id)->first();
        return view('project.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projects = Project::findOrFail($id);

        $request->validate([
            'project_name' => 'required',
            'project_goal' => 'required',
            'performance_metric' => 'required',
            'project_status' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ],
        [
            'project_name.required' => 'Project name is required',
            'project_goal.required' => 'Project goal is required',
            'performance_metric.required' => 'Performance metric is required',
            'project_status.required' => 'Project status is required',
            
            'picture.image' => 'Picture must be an image',
            'picture.mimes' => 'Pictures must be in jpeg, png, jpg, gif format',
            'picture.max' => 'Maximum picture size is 2MB',
            'description.required' => 'Description is required',
        ]);

        
        $projects->project_name = $request->project_name; 
        $projects->project_goal = $request->project_goal;
        $projects->performance_metric = $request->performance_metric;
        $projects->project_status = $request->project_status;
        if ($request->hasFile('picture')) {
            $upload = $this->upload($request);
        $projects->picture = $upload->getSecurePath();
        }
        
        $projects->description = $request->description;

        $projects->update();
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::where('id', $id)->first();
        $project->delete();
        return redirect()->route('projects.index');
    }
}
