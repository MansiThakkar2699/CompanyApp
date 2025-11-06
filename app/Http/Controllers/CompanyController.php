<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $services = ['IT', 'Finance', 'Marketing', 'HR'];
        $branches = ['Head Office', 'Regional', 'Overseas'];
        return view('companies.create', compact('countries', 'services', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo')->store('logos', 'public');
            $data['company_logo'] = $file;
        }

        $data['services'] = json_encode($request->services);
        $data['branches'] = json_encode($request->branches);

        Company::create($data);

        return redirect()->route('companies.index')->with('success', 'Company created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::with(['country', 'state', 'city'])->findOrFail($id);

        // Force decode if not array
        if (is_string($company->services)) {
            $company->services = json_decode($company->services, true);
        }
        if (is_string($company->branches)) {
            $company->branches = json_decode($company->branches, true);
        }

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $countries = Country::all();
        $services = ['IT', 'Finance', 'Marketing', 'HR'];
        $branches = ['Head Office', 'Regional', 'Overseas'];
        return view('companies.edit', compact('company', 'countries', 'services', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->all();

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo')->store('logos', 'public');
            $data['company_logo'] = $file;
        }

        $data['services'] = json_encode($request->services);
        $data['branches'] = json_encode($request->branches);

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Company deleted!');
    }

    public function getStates($country_id)
    {
        return response()->json(State::where('country_id', $country_id)->get());
    }

    public function getCities($state_id)
    {
        return response()->json(City::where('state_id', $state_id)->get());
    }
}
