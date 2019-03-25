<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();

        $company = new Company();

        if($request->hasFile('add_company_logo')) {
            $logo = $request->file('add_company_logo');
            $extension = $logo->getClientOriginalExtension();            
            $path = 'storage/images/company_logo/'.$request->add_company_logo->store('', 'company_logo');
            $company->logo = $path;
        }
        $company->name = $request->input('add_company_name');
        $company->website = $request->input('add_company_website');
        $company->email = $request->input('add_company_email');
        $company->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $validated = $request->validated();

        $company = Company::findOrFail($id);

        if($request->hasFile('company_logo')) {
            $logo = $request->file('company_logo');
            $extension = $logo->getClientOriginalExtension();            
            $path = 'storage/images/company_logo/'.$request->company_logo->store('', 'company_logo');
            $company->logo = $path;
        }
        $company->name = $request->input('company_name');        
        $company->website = $request->input('company_website');
        $company->email = $request->input('company_email');
        $company->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return back();
    }
}
