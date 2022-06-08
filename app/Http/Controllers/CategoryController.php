<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('abbr','asc')->get();
        return view('category.index', ['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('abbr','asc')->get();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $categorylist = Category::orderBy('abbr','asc')->get();
        $categoryabbrlist = Category::orderBy('id','asc')->get(['abbr']);

        $countcategory = Category::count();

        $category->id = request('id');
        $category->name = request('name'); 


        //Removing space and getting character countsof input category
        $nospaceinput = str_replace(" ", "", request('name'));
        $length = strlen($nospaceinput);

        //Adding single character to array
        for ($loop1 = 0; $loop1 < $length; $loop1++) {
            $input[($loop1)] = strtoupper (substr($nospaceinput,($loop1),1));
        }      
        
        $checking[(0)] = 'D';
        $checking[(1)] = 'D';
        
        if($countcategory==0){
            $inputabbr = strtoupper (substr(request('name'),0,3));
        }else{
            for ($loop2 = 0; $loop2 < ($length-2); $loop2++) {
                for ($loop3 = 0; $loop3 < $countcategory; $loop3++) {
                    if($categoryabbrlist[$loop3]->abbr == ($input[0].$input[1].$input[($loop2+2)])){
                        $checking[($loop2+2)] = 'F';
                        break;
                    }else{
                        $checking[($loop2+2)] = 'NF';
                    }
                }  
            }              
        }

        for($loop4 = 0; $loop4 < count($checking); $loop4++){
            if( $checking[$loop4] == 'NF'){
                $inputabbr = $input[0].$input[1].$input[$loop4];
                break;
            }
        }
        
        $category->abbr = $inputabbr;
        $category->description = request('description');
        $category->save();
        
        $category = Category::orderBy('name','asc')->get();
        return view('category.create', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $category = Category::where('id', $id)->first();
        if ($category) {
            return view('category.edit', ['category'=>$category]);
        }
        return redirect()->back()->with('danger', 'Category Not Found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => "required",
            'description' => "required",
        ]);

        $category = new Category();
        $categorylist = Category::orderBy('abbr','asc')->get();
        $categoryabbrlist = Category::orderBy('id','asc')->get(['abbr']);

        $countcategory = Category::count();

        $category->id = request('id');
        $category->name = request('name'); 


        //Removing space and getting character countsof input category
        $nospaceinput = str_replace(" ", "", request('name'));
        $length = strlen($nospaceinput);

        //Adding single character to array
        for ($loop1 = 0; $loop1 < $length; $loop1++) {
            $input[($loop1)] = strtoupper (substr($nospaceinput,($loop1),1));
        }      
        
        $checking[(0)] = 'D';
        $checking[(1)] = 'D';
        
        if($countcategory==0){
            $inputabbr = strtoupper (substr(request('name'),0,3));
        }else{
            for ($loop2 = 0; $loop2 < ($length-2); $loop2++) {
                for ($loop3 = 0; $loop3 < $countcategory; $loop3++) {
                    if($categoryabbrlist[$loop3]->abbr == ($input[0].$input[1].$input[($loop2+2)])){
                        $checking[($loop2+2)] = 'F';
                        break;
                    }else{
                        $checking[($loop2+2)] = 'NF';
                    }
                }  
            }              
        }

        for($loop4 = 0; $loop4 < count($checking); $loop4++){
            if( $checking[$loop4] == 'NF'){
                $inputabbr = $input[0].$input[1].$input[$loop4];
                break;
            }
        }

        Category::where('id', $id)->update([
            'id' => $id,
            'abbr' => $inputabbr,
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        $category = Category::orderBy('name','asc')->get();
        return view('category.create', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from categories where id = ?',[$id]);

        $category = Category::orderBy('name','asc')->get();
        return view('category.create', compact('category'));
    }
}
