<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminPage(){
        $companies = Company::paginate(10, ['*'], 'company');
        $employees = Employee::paginate(10, ['*'], 'employee');
        return view('adminpage', compact('companies', 'employees'));
    }
}
