<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $companies = auth()->user()->companies()->with('contacts')->latestFirst()->paginate(5);

        return view('companies.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $company = new Company();

        return view('companies.create',['company'=>$company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $request->user()->companies()->create($request->all());

        return redirect()->route('companies.index')->with('message','Company has been added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

        return view('companies.show', ['company'=> $company]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        return redirect()->route('companies.index')->with('message','Company has been updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return  redirect()->route('companies.index')->with('message','Company has been deleted Successfully');
    }
}
