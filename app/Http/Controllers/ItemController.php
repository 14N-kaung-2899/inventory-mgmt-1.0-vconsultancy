<?php

namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Item;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use DB;

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
        $i = Item::orderBy('updated_at','desc')->get();
        $e = Employee::all();
        $s = Storage::all();
        $c = Category::orderBy('name','asc')->get();      

        $item = $i;
        $employee = $e;
        $storage = $s;
        $category = $c;

        return view('item.create', compact('item','employee','storage','category'));
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
        if(request('description')==""||request('description')==null){
            $item->description = "N/A";
        }else{            
            $item->description = request('description');
        }
        
        //Owner
        $empname = Employee::where('id', request('employee'))->get(['fname', 'mname', 'lname'])->first();
        if($empname==""|| $empname==null){
            $item->owner = "Stored In Office";            
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

        $item = Item::orderBy('itemid','asc')->get();


        $item = Item::orderBy('itemid','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();

        return view('item.index', compact('employee', 'item','category','storage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show', compact('item'));
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

        $e = Employee::all();
        $s = Storage::all();
        $c = Category::orderBy('name','asc')->get();   
        
        $employee = $e;
        $storage = $s;
        $category = $c;

        if ($item) {
            return view('item.edit', compact('item', 'employee','storage','category'));
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

        $empname = Employee::where('id', request('employee'))->get(['fname', 'mname', 'lname'])->first();
        if($empname==""|| $empname==null){
            $ownername = "Stored In Office";            
        }else{
            if($empname->mname=="N/A"){
                $ownername = ($empname->fname)." ".($empname->lname); 
            }else{
                $ownername = ($empname->fname)." ".($empname->mname)." ".($empname->lname); 
            }
        }

        $countcategory = Item::where('cid',request('category'))->count();
        $ckey = Category::where('id', $request->category)->get(['abbr'])->first();

        Item::where('id', $id)->update([
            'id' => $id,       
            'name' => $request->name,
            'description' => $request->description,
            'owner' => $ownername,
            'itemid' => $ckey->abbr.'-'.($countcategory+1), 
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
        DB::delete('delete from items where id = ?',[$id]);

        $item = Item::orderBy('itemid','asc')->get();
        $employee = Employee::orderBy('id','asc')->get();
        $category = Category::orderBy('id','asc')->get();
        $storage = Storage::orderBy('id','asc')->get();

        return view('item.index', compact('employee', 'item','category','storage'));
    }
}
