<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\Office;
use Illuminate\Http\Request;
use DB;

class StorageController extends Controller
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
        $storage = Storage::orderBy('office_id','asc')->get();
        $office = Office::orderBy('name','asc')->get();

        return view('storage.create', compact('storage', 'office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storage = new Storage();

        $storage->id = request('id');
        $storage->storageid = strtoupper (substr(request('name'),0,3)).'-'.(request('storageid'));
        $storage->name = request('name');
        $storage->description = request('description');
        $storage->office_id = request('office_id');
        $storage->save();
        
        $storage = Storage::orderBy('office_id','asc')->get();
        $office = Office::orderBy('name','asc')->get();

        return view('storage.create', compact('storage', 'office'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldstorage = Storage::where('id', $id)->first();
        $storage = Storage::orderBy('office_id','asc')->get();
        $office = Office::orderBy('name','asc')->get();
        if ($storage) {
            return view('storage.edit', compact('oldstorage', 'storage', 'office'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'storageid' => "required",
            'name' => "required",
            'description' => "required",
        ]);

        Storage::where('id', $id)->update([
            'id' => $id,
            'storageid' => strtoupper (substr(($request->name),0,3)).'-'.(($request->storageid)),            
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        $storage = Storage::orderBy('office_id','asc')->get();
        $office = Office::orderBy('name','asc')->get();

        return view('storage.create', compact('storage', 'office'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from storages where id = ?',[$id]);

        $storage = Storage::orderBy('office_id','asc')->get();
        $office = Office::orderBy('name','asc')->get();

        return view('storage.create', compact('storage', 'office'));
    }
}
