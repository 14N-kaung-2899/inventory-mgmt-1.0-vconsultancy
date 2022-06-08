<?php

namespace App\Http\Controllers;

use App\Models\Role;
use DB;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $role = Role::orderBy('name','asc')->get();
        return view('role.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();

        $role->id = request('id');
        $role->name = request('name');
        $role->respons = request('respons');
        $role->save();
        
        $role = Role::orderBy('name','asc')->get();
        return view('role.create', compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldrole = Role::where('id', $id)->first();
        $role = Role::orderBy('name','asc')->get();        
        if ($role) {
            return view('role.edit', compact('role', 'oldrole'));        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
            'respons' => "required",
        ]);

        Role::where('id', $id)->update([
            'id' => $id,          
            'name' => $request->name,
            'respons' => $request->respons
        ]);
        
        $role = Role::orderBy('name','asc')->get();
        return view('role.create', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from roles where id = ?',[$id]);

        $role = Role::orderBy('name','asc')->get();
        return view('role.create', compact('role'));
    }
}
