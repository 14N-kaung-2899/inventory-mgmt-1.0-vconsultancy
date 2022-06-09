<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Employment;
use App\Models\Item;
use App\Models\Office;
use App\Models\Payroll;
use App\Models\Role;
use App\Models\Storage;
use App\Models\User;

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
        $category = Category::orderBy('id','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $employment = Employment::orderBy('id','asc')->get();
        $item = Item::orderBy('id','asc')->get();
        $office = Office::orderBy('id','asc')->get();
        $payroll = Payroll::orderBy('id','asc')->get();
        $role = Role::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();
        $user = User::orderBy('id','asc')->get();

        return view('home', compact('category', 'employee', 'employment','item', 'office', 'payroll','role', 'storage', 'user'));
    }
}
