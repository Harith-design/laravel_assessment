<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('companies_index')->with([
        'companies' => Companies::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'required',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');
        $company = new Companies();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $logoPath;
        $company->website = $request->input('website');
        $company->save();


        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('companies_view')->with([
            'company' => Companies::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('companies_edit')->with([
            'company' => Companies::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'required',
        ]);



        $company = Companies::findOrFail($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
