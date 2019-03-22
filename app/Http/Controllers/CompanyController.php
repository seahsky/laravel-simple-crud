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

        $logo = $request->file('company_logo');
        $extension = $logo->getClientOriginalExtension();
        Storage::disk('company_logo')->put($logo->getFileName().'.'.$extension, File::get($logo));
        $path = Storage::disk('company_logo')->url($logo->getFileName());

        $company = new Company();
        $company->name = $request->company_name;
        $company->logo = $path;
        $company->website = $request->company_website;
        $company->email = $request->company_email;
        $company->save();
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

        $logo = $request->file('edit_company_logo');
        $extension = $logo->getClientOriginalExtension();
        Storage::disk('edit_company_logo')->put($logo->getFileName().'.'.$extension, File::get($logo));
        $path = Storage::disk('company_logo')->url($logo->getFileName());

        $company = Company::findOrFail($id);
        $company->name = $request->edit_company_name;
        $company->logo = $path;
        $company->website = $request->edit_company_website;
        $company->email = $request->edit_company_email;
        $company->save();
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
    }
}
