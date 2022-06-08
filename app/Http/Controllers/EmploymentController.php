<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use DB;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employment = Employment::orderBy('salary','asc')->get();        
        return view('employment.create', compact('employment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generatedid = request('empid')."_".(strtolower(substr(date("l"),0,2))."d").date("d")."_".date("m_Y");

        $employment = new Employment();

        $employment->id = request('id');
        $employment->empid = $generatedid;
        $employment->link = $generatedid.".pdf";
        $employment->salary = request('salary');
        $employment->save();
        
        $employment = Employment::orderBy('salary','asc')->get();        
        return view('employment.create', compact('employment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function show(Employment $employment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldemployment = Employment::where('id', $id)->first();
        
        $employment = Employment::orderBy('salary','asc')->get();
        if ($employment) {
            return view('employment.edit', compact('oldemployment','employment'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => "required",
            'empid' => "required",
            'salary' => "required"
        ]);

        Employment::where('id', $id)->update([
            'id' => $id,
            'link' => $request->link,
            'empid' => $request->empid,
            'salary' => $request->salary
        ]);
        
        $employment = Employment::orderBy('salary','asc')->get();        
        return view('employment.create', compact('employment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from employments where id = ?',[$id]);

        $employment = Employment::orderBy('salary','asc')->get();        
        return view('employment.create', compact('employment'));
    }
}
