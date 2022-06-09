<?php

namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Item;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Category;
use App\Models\Office;
use App\Models\Location;
use App\Models\Subdistrict;
use App\Models\District;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Auth;
use DB;
use PHPUnit\Framework\Constraint\Count;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $item = Item::orderBy('itemid','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();

        return view('item.index', compact('employee', 'item','category','storage'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $items = Item::query()
            ->where('itemid', 'LIKE', "%{$search}%")
            ->orWhere('eid', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('search', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('name','asc')->get();
        $storage = Storage::orderBy('name','asc')->get();

        return view('item.create', compact('employee','storage','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        
        $item->id = request('id');
        
        //Name
        $item->name = request('name');

        //Description
        if(request('description')==" "||request('description')==null){
            $item->description = "N/A";
        }else{            
            $item->description = request('description');
        }
        
        //Owner
        $empname = Employee::where('id', request('owner'))->get(['fname', 'mname', 'lname'])->first();

        if($empname==""|| $empname==null){
            $item->owner = "Owned By Office";            
        }else{
            if($empname->mname=="N/A"){
                $item->owner = ($empname->fname)." ".($empname->lname); 
            }else{
                $item->owner = ($empname->fname)." ".($empname->mname)." ".($empname->lname); 
            }
        }
        
        
        //Item ID
        $countcategory = Item::where('cid',request('category'))->count();
        $ckey = Category::where('id', $request->category)->get(['abbr'])->first();
        $item->itemid = $ckey->abbr.'-'.($countcategory+1);  

        //QR
        $item->qrcode = "https://aibtglobal.edu.au/";
        
        //Storage
        $item->sid = request('storage');
        
        //Category
        $item->cid = request('category');
        
        //Employee
        if(request('employee')=="Office (Stored)"){
            $storagename = Storage::where('id', request('storage'))->get(['name'])->first();
            $item->eid = 0;
        }else{            
            $item->eid = request('employee');
        }

        $item->save();
        
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('name','asc')->get();
        $storage = Storage::orderBy('name','asc')->get();

        return view('item.create', compact('employee', 'category','storage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $category = Category::where('id', $item->cid)->first();        
        $storage = Storage::where('id', $item->sid)->first();
        $office = Office::where('id', $storage->office_id)->first();
        
        $employee = Employee::where('id', $item->eid)->first();

        $location = Location::where('id', $storage->office_id)->first();
        $subdistrict = Subdistrict::where('id', $location->subdistrict_id)->first();
        $district = District::where('id', $subdistrict->district_id)->first();
        $city = City::where('id', $district->city_id)->first();
        $country = Country::where('id', $city->country_id)->first();

        return view('item.show', compact('item', 'category', 'storage','office', 'employee', 'location','subdistrict', 'district', 'city', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::where('id', $id)->first();

        $employee = Employee::all();
        $storage = Storage::all();
        $category = Category::orderBy('name','asc')->get();   

        $getname = Employee::get(['fname','mname','lname']);

        for($loop=0; $loop<count($getname); $loop++){
            if(($getname[$loop]->mname)=="N/A"){
                $empname[$loop]=($getname[$loop]->fname)." ".($getname[$loop]->lname);
            }else{
                $empname[$loop]=($getname[$loop]->fname)." ".($getname[$loop]->mname)." ".($getname[$loop]->lname);
            }
        }

        if ($item) {
            return view('item.edit', compact('item', 'employee','storage','category', 'empname'));
        }
        return redirect()->back()->with('danger', 'Item Not Found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
        ]);

        Item::where('id', $id)->update([
            'id' => $id,       
            'name' => $request->name,
            'description' => $request->description,
            'owner' => $request->owner,
            'itemid' => $request->itemid,
            'qrcode' => $request->qrcode,
            'sid' => $request->storage,
            'cid' => $request->category,
            'eid' => $request->employee
        ]);
        
        $item = Item::orderBy('itemid','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();

        return view('item.index', compact('employee', 'item','category','storage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Got Deleted Item
        $inputdelete = Item::where('id', $id)->first();
        $deletenum = substr($inputdelete->itemid,4);
        $deletekey = substr($inputdelete->itemid,0,4);

        //Got All Same Category
        $samecate = Item::where('cid', $inputdelete->cid)->get();
        $leftitem = Item::where('cid', $inputdelete->cid)->get(['itemid']);       
        
        $temp = "Default";

        $chkloop = 0;

        for($loop=$deletenum; $loop < count($samecate); $loop++){  
            Item::where('itemid', ($deletekey.substr(($samecate[$loop]->itemid),4)))->update([                                
                'itemid' => $deletekey.(substr(($samecate[$loop]->itemid),4)-1),
            ]);
            $chkloop = $chkloop + 1;
        } 

        DB::delete('delete from items where id = ?',[$id]);        

        $item = Item::orderBy('itemid','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();

        return view('item.index', compact('employee', 'item','category','storage'));
    }
}
