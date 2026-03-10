<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Companies;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee_index')->with([
            'employees' => Employee::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employeeT')->with([
            'companies' => Companies::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('employee_view')->with([
            'employee' => Employee::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employee_edit')->with([
            'employee' => Employee::findOrFail($id),
            'companies' => Companies::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findorFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');

    }
}
