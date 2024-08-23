<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Project;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = DB::table('budgets')
                ->join('projects', 'budgets.id_project', '=', 'projects.id')
                ->join('sources', 'budgets.id_source', '=', 'sources.id')
                ->select('budgets.*', 'projects.project_name', 'sources.source_name')
                ->get();
        
        return view('budget.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $projects = Project::orderBy('id' , 'ASC')->get();
        $sources = Source::orderBy('id' , 'ASC')->get();
        return view('budget.create', compact('projects', 'sources'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'projects' => 'required',
        'total_budget' => 'required',
        'sources' => 'required',
    ], [
        'projects.required' => 'Project is required',
        'total_budget.required' => 'Total Budget is required',
        'sources.required' => 'Source Name is required',
    ]);

    $budget = new Budget;
    $budget->id_project = $request->projects;
    $budget->total_budget = $request->total_budget; 
    $budget->id_source = $request->sources;
    $budget->save();

    return redirect()->route('budgets.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sources = DB::table('sources')->get();
        $projects = DB::table('projects')->get();
        $data = Budget::where('id', $id)->first();
        return view('budget.show', compact('data', 'projects', 'sources'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sources = DB::table('sources')->get();
        $projects = DB::table('projects')->get();
        $data = Budget::where('id', $id)->first();
        return view('budget.edit', compact('data', 'projects', 'sources'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $budgets = Budget::findOrFail($id);
        $request->validate([
            'projects' => 'required',
            'total_budget' => 'required',
            'sources' => 'required',
            
        
        ],
        [
            'projects.required' => 'Project is required',
            'total_budget.required' => 'Total Budget is required',
            'sources.required' => 'Source Name is required',
            
            
        ]);

        
        $budgets->id_project = $request->projects;
        $budgets->total_budget = $request->total_budget; 
        $budgets->id_source = $request->sources;
        
        

        $budgets->update();
        return redirect()->route('budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $budget = Budget::where('id', $id)->first();
        $budget->delete();
        return redirect()->route('budgets.index');
    }
}
