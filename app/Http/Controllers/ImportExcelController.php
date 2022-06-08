<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImportExcelController extends Controller
{
    function index(){
        $data = DB::table('countries')-orderBy('id', 'asc')->get();
        return view('country.create', compact('data'));
    }
}
