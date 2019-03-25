<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();

        $employee = new Employee();
        $employee->first_name = $request->input('add_employee_first_name');
        $employee->last_name = $request->input('add_employee_last_name');
        $employee->company_id = Company::where('email', $request->input('add_employee_company'))->pluck('id')[0];
        $employee->phone = $request->input('add_employee_phone');
        $employee->email = $request->input('add_employee_email');
        $employee->save();
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
    public function update(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();

        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->input('employee_first_name');
        $employee->last_name = $request->input('employee_last_name');
        $employee->company_id = Company::where('email', $request->input('employee_company'))->pluck('id')[0];
        $employee->phone = $request->input('employee_phone');
        $employee->email = $request->input('employee_email');
        $employee->save();
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
        Employee::destroy($id);
        return back();
    }
}
