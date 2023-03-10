<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // return view('projects.index')
        //     ->with('projects', Project::all())
        //     ->with("showBackToProjects", false);

        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(4)->withQueryString())
            ->with('categoryName', null);
    }

    
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }


    public function listByCategory(Category $category)
    {
        return view('projects.index')
            // ->with('projects', $category->projects)
            // ->with('projects', $category->projects()->orderBy('published_date', 'asc')->get())
            ->with('projects', $category->projects()->orderBy('published_date', 'asc')->paginate(2)->withQueryString())
            ->with("category", $category->name);
            // ->with('categoryName', $category->name);
    }


    public function listByTag(Tag $tag)
    {
        return view('projects.index')
            // ->with('projects', $category->projects)
            // ->with('projects', $category->projects()->orderBy('published_date', 'asc')->get())
            ->with('projects', $tag->projects()->orderBy('published_date', 'asc')->paginate(2)->withQueryString())
            ->with("tag", $tag->name);
            // ->with('tagName', $tag->name);
    }

    public function about()
    {
        $about= "This is About page!";
        return view('projects.about', ['about' => $about]);
    }



    public function create() {
        return view('admin.projects.create')
            ->with("project", null)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    // public function store(Project $project, Request $request) {
    public function store(Request $request) {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        
        $project = Project::create($attributes);
        
        $tags = $request->input('tags');
        $project->tags()->attach($tags);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }



    public function edit(Project $project) {
        return view('admin.projects.create')
            ->with('project', $project)
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('flagEdit', true);
    }

    public function update(Project $project, Request $request) {
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            // 'tags' => ['nullable','sometimes','tags'],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        // ddd("checking data: ", $project);
        $tags = $request->input('tags');
        $project->tags()->sync($tags);

        // Save updates to the DB
        $project->update($attributes);
        // Set a flash message
        session()->flash('success','Project Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        // $projects = Project::all();
        return response()->json($projects);
    }
}
