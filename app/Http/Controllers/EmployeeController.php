<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Country;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\City;
use App\Models\Payroll;
use App\Models\Employment;
use App\Models\Role;
use App\Models\Office;
use DB;
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
        $employee = Employee::orderBy('updated_at','desc')->get();

        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::orderBy('id','asc')->get();
        $city = City::orderBy('id','asc')->get();
        $district = District::orderBy('id','asc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        $payroll = Payroll::orderBy('holder','asc')->get();
        $employment = Employment::orderBy('empid','asc')->get();
        $role = Role::orderBy('name','asc')->get();
        $office = Office::orderBy('name','asc')->get();
        $employee = Employee::orderBy('fname','asc')->get();

        return view('employee.create', compact('payroll', 'office', 'employment', 'role', 'country', 'city', 'district', 'subdistrict'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->id = request('id');
        $employee->fname = request('fname');

        if(request('mname')=="" || request('mname')=="null"){
            $employee->mname = "N/A";
        }else{
            $employee->mname = request('mname');
        }
        
        $employee->lname = request('lname');
        $employee->gender = request('gender');
        $employee->dob = request('day')."-".request('month')."-".request('year');
        $employee->pmail = request('pmail');
        
        if(request('wmail')=="" || request('wmail')=="null"){
            $employee->wmail = "N/A";
        }else{
            $employee->wmail = request('wmail');
        }

        if(request('home')=="" || request('home')=="null"){
            $employee->home = "N/A";
        }else{
            $employee->home = request('home');
        }        
        
        $employee->mobile = request('mobile');
        $employee->line1 = request('line1');
        $employee->line2 = request('line2');
        $employee->subdistrict_id = request('subdistrict_id');
        $employee->rid = request('role');
        $employee->pid = request('payroll');
        $employee->empid = request('employment');
        $employee->oid = request('office');
        $employee->save();

        $updateoffice = Office::orderBy('id','asc')->get();

        for($ocount=0; $ocount<count($updateoffice); $ocount++){
            $count = Employee::where('oid',$updateoffice[$ocount]->id)->count();   
            Office::where('id', $updateoffice[$ocount]->id)->update([                
                'empno' => $count
            ]);
        }

        $employee = Employee::orderBy('updated_at','desc')->get();

        return view('employee.index', compact('employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($eid)
    {        
        $employee = new Employee();
        $foundemployee = Employee::where('name', $eid)->first();
        return view('employee.show', ['foundemployee'=>$foundemployee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
