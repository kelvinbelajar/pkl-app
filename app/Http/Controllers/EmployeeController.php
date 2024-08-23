<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'ASC')->get();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required',
            'occupation' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required',

        ],
        [
            'employee_name.required' => 'Employee Name is required',
            'occupation.required' => 'Occupation is required',
            'address.required' => 'Address is required',
            'gender.required' => 'Gender is required',
            'phone_number.required' => 'Phone Number is required',
            'email.required' => 'Email is required',
        ]);

        $employees = new Employee;
        $employees->employee_name = $request->employee_name; 
        $employees->occupation = $request->occupation;
        $employees->address = $request->address;
        $employees->gender = $request->gender;
        $employees->phone_number = $request->phone_number;
        $employees->email = $request->email;

        $employees->save();
        return redirect()->route('employees.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Employee::where('id', $id)->first();
        return view('employee.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Employee::where('id', $id)->first();
        return view('employee.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employees = Employee::findOrFail($id);

        $request->validate([
            'employee_name' => 'required',
            'occupation' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'email' => 'required',

        ],
        [
            'employee_name.required' => 'Employee Name is required',
            'occupation.required' => 'Occupation is required',
            'address.required' => 'Address is required',
            'gender.required' => 'Gender is required',
            'phone_number.required' => 'Phone Number is required',
            'email.required' => 'Email is required',
        ]);

        
        $employees->employee_name = $request->employee_name; 
        $employees->occupation = $request->occupation;
        $employees->address = $request->address;
        $employees->gender = $request->gender;
        $employees->phone_number = $request->phone_number;
        $employees->email = $request->email;

        $employees->update();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::where('id', $id)->first();
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
