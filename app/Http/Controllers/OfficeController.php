<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Location;
use App\Models\Employee;
use DB;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::orderBy('name','asc')->get();

        return view('office.index', compact('office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::orderBy('subdistrict_id','asc')->get();

        return view('office.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $office = new Office();

        $office->name = request('name');
        $office->description = request('description');
        $office->empno = "0";
        $office->lid = request('location');
        $office->save();
        
        $office = Office::orderBy('updated_at','desc')->get();

        return view('office.index', compact('office'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::orderBy('subdistrict_id','asc')->get();
        $office = Office::where('id', $id)->first();
        if ($office) {
            return view('office.edit', compact('office', 'location'));
        }
        return redirect()->back()->with('danger', 'Office Not Found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
            'description' => "required",
        ]);

        Office::where('id', $id)->update([
            'id' => $id,
            'name' => $request->name,
            'description' => $request->description,
            'empno' => $request->empno,
            'lid' => $request->lid,
        ]);

        $office = Office::orderBy('updated_at','desc')->get();

        return view('office.index', compact('office'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from offices where id = ?',[$id]);

        $office = Office::orderBy('updated_at','desc')->get();

        return view('office.index', compact('office'));
    }
}
