<?php

namespace App\Http\Controllers;

use App\Models\UserRegister;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('role','asc')->get();
        $emails = User::orderBy('email','asc')->get();
        return view('userregister.index', compact('users', 'emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('role','asc')->get();
        return view('userregister.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        
        $user->name = request('name');
        $user->role = request('role');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        
        $users = User::orderBy('role','asc')->get();
        $emails = User::orderBy('email','asc')->get();
        return view('userregister.create', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function show(UserRegister $userRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRegister $userRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRegister $userRegister)
    {
        if(($request->role)=="Delete"){
            DB::delete('delete from users where email = ?',[$request->email]);

            $users = User::orderBy('role','asc')->get();
            $emails = User::orderBy('email','asc')->get();
            return view('userregister.index', compact('users', 'emails'));
        }else{
            $id = User::where('email', $request->email)->get()->first();

            User::where('email', $request->email)->update([
                'id' => $id->id,
                'name' => $id->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => $id->password
            ]);
    
            $users = User::orderBy('role','asc')->get();
            $emails = User::orderBy('email','asc')->get();
            return view('userregister.index', compact('users', 'emails'));
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRegister  $userRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRegister $userRegister)
    {
        //
    }
}
