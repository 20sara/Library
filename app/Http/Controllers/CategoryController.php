<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {

        $data =  Category::all();
        return view('admin.category.show_category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $request->validate([
        //     'cat_title' => 'required|max:255',
        //   ]);

        Category::create([
            'cat_title' => $request->category
        ]);
       return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data =  Category::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data =  Category::findOrFail($id);
        return view('admin.category.edit_category',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $data =  Category::findOrFail($id);

         $data->update([
          'cat_title' => $request->category
            ]);
       return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // 
    public function delete( string $id)
    {
       Category::destroy($id);
        
        return redirect()->route('category.index');
       
    }
}
