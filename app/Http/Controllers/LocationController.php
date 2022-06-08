<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Country;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\City;
use DB;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::orderBy('updated_at','desc')->get();

        return view('location.index', compact('location'));
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

        return view('location.create', compact('country', 'city', 'district', 'subdistrict'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location();

        $location->line1 = request('line1');
        $location->line2 = request('line2');
        $location->subdistrict_id = request('sdis');
        $location->save();
        
        $location = Location::orderBy('updated_at','desc')->get();

        return view('location.index', compact('location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        $location = Location::where('id', $id)->first();
        if ($location) {
            return view('location.edit', compact('location', 'subdistrict'));
        }
        return redirect()->back()->with('danger', 'Location Not Found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'line1' => "required",
            'line2' => "required",
            'subdistrict_id' => "required",
        ]);

        Location::where('id', $id)->update([
            'id' => $id,
            'line1' => $request->line1,
            'line2' => $request->line2,
            'subdistrict_id' => $request->subdistrict_id
        ]);

        $location = Location::orderBy('updated_at','desc')->get();

        return view('location.index', compact('location'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        DB::delete('delete from locations where id = ?',[$id]);

        $location = Location::orderBy('updated_at','desc')->get();

        return view('location.index', compact('location'));
    }
}
