<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }


    public function create() 
    {
        return view('admin.categories.create')
            ->with("category", null);
            // ->with('categories', Category::all());
    }

    public function store(Category $category, Request $request) {
        $attributes = request()->validate([
            'name' => 'required'
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);
        
        Category::create($attributes);

        // Set a flash message
        session()->flash('success','Category Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }



    public function edit(Category $category) {
        return view('admin.categories.create')
            ->with('category', $category);
            // ->with('categories', Category::all());
    }

    public function update(Category $category, Request $request) {
        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id]
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        // Save updates to the DB
        $category->update($attributes);
        // Set a flash message
        session()->flash('success','Category Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


    public function destroy(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
