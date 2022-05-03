<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['categories'] = category::orderBy('id','desc')->paginate(5);
    return view('admin.categorylist', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('admin.categoryform');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    $request->validate([
    'category_name' => 'required',
    'category_imagename' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ]);
    $Category = new category;
    $Category->category_name = $request->category_name;
    $fileName = time().$request->file('category_imagename')->getClientOriginalName();
    $path = $request->file('category_imagename')->storeAs('images', $fileName, 'public');
    $Category->category_imagename= '/storage/'.$path;
    $Category->save();
    return redirect()->route('category.index')
    ->with('success','category has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\category  $Category
    * @return \Illuminate\Http\Response
    */
    public function show(category $Category)
    {
    return view('admin.show',compact('Category'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\category  $Category
    * @return \Illuminate\Http\Response
    */
    public function edit(Category $Category)
    {
    return view('admin.editcategory',compact('Category'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\category  $Category
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
        'category_name' => 'required',
        'category_imagename' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $Category = category::find($id);
        $Category->category_name = $request->category_name;
        $fileName = time().$request->file('category_imagename')->getClientOriginalName();
        $path = $request->file('category_imagename')->storeAs('images', $fileName, 'public');
        $Category->category_imagename= '/storage/'.$path;
        $Category->save();
        return redirect()->route('category.index')
        ->with('success','category has been created successfully.');
        }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\category  $Category
    * @return \Illuminate\Http\Response
    */
    public function destroy(category $Category)
    {
        $Category->delete();
    return redirect()->route('category.index')
    ->with('success','Category has been deleted successfully');
    }
    }