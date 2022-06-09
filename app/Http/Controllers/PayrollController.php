<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Subdistrict;
use DB;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payroll = Payroll::orderBy('id','asc')->get();
        return view('payroll.index', compact('payroll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payroll = Payroll::orderBy('updated_at','desc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        
        return view('payroll.create', compact('payroll','subdistrict'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payroll = new Payroll();

        $payroll->id = request('id');
        $payroll->holder = request('holder');
        $payroll->accno = request('accno');
        $payroll->bank = request('bank');
        if(request('ifsc')==""||request('ifsc')==null){
            $payroll->ifsc = "N/A";
        }else{
            $payroll->ifsc = request('ifsc');           
        }
        
        $payroll->code = request('code');
        $payroll->line1 = request('line1');
        $payroll->line2 = request('line2');
        $payroll->subdistrict_id = request('subdistrict_id');
        $payroll->save();
        
        $payroll = Payroll::orderBy('updated_at','desc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        return view('payroll.create', compact('payroll','subdistrict'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oldpayroll = Payroll::where('id', $id)->first();
        $payroll = Payroll::orderBy('bank','asc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        if ($payroll) {
            return view('payroll.edit', compact('payroll', 'oldpayroll','subdistrict'));            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'holder' => "required",
            'accno' => "required",
            'bank' => "required",
            'line1' => "required",
            'line2' => "required",
            'ifsc' => "required",
            'code' => "required"
        ]);

        Payroll::where('id', $id)->update([
            'id' => $id,
            'holder' => $request->holder,
            'accno' => $request->accno,
            'bank' => $request->bank,
            'line1' => $request->line1,
            'line2' => $request->line2,
            'subdistrict_id' => $request->subdistrict_id,
            'ifsc' => $request->ifsc,
            'code' => $request->code
        ]);
        
        $payroll = Payroll::orderBy('updated_at','desc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        return view('payroll.create', compact('payroll','subdistrict'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from payrolls where id = ?',[$id]);

        $payroll = Payroll::orderBy('bank','asc')->get();
        $subdistrict = Subdistrict::orderBy('name','asc')->get();
        return view('payroll.create', compact('payroll','subdistrict'));
    }
}
