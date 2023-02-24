<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }


    public function create() 
    {
        return view('admin.tags.create')
            ->with("tag", null);
            // ->with('categories', Category::all());
    }

    public function store(Tag $tag, Request $request) {
        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id]
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);
        
        Tag::create($attributes);

        // Set a flash message
        session()->flash('success','Tag Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }



    public function edit(Tag $tag) {
        return view('admin.tags.create')
            ->with('tag', $tag);
    }

    public function update(Tag $tag, Request $request) {
        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id]
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        // Save updates to the DB
        $tag->update($attributes);
        // Set a flash message
        session()->flash('success','Tag Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


    public function destroy(Tag $tag) {
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
