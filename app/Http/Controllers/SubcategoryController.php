<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subcategories = Subcategory::all();
        return view('subcategory.index', compact('subcategories'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcat = new Subcategory();
        $subcat->name = $request->input('subcategoryName');
        $subcat->category_id = $request->input('category_id');
        
        if($subcat->save()){
            return redirect()->back()->with('success', 'Subcategory inserted successfully!');
        }
        return redirect()->back()->with('failed', 'Subcategory could not be inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('subcategoryName');
        if($subcategory->save()){
            return redirect()->back()->with('success', 'Updated successfully!');
        }
        return redirect()->back()->with('failed', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Subcategory::destroy($id))
        {
            return redirect()->back()->with('deleted', 'Deleted successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
    
}
