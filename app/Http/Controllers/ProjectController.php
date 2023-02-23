<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Category;

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
            ->with("category", $category->name)
            ->with('categoryName', $category->name);
    }



    public function about()
    {
        $about= "This is About page";
        return view('projects.about', ['about' => $about]);
    }



    public function create() {
        return view('admin.projects.create')
            ->with("project", null)
            ->with('categories', Category::all());
    }

    public function store(Project $project, Request $request) {
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
        
        Project::create($attributes);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }



    public function edit(Project $project) {
        return view('admin.projects.create')
            ->with('project', $project)
            ->with('categories', Category::all());
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
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        // Save updates to the DB
        $project->update($attributes);
        // Set a flash message
        session()->flash('success','Project Created Successfully');

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
}

/*
public function index()
{
    $projects = [
        [
            'id' => 0,
            'title' => 'Node.js Yearbook',
            'description' => 'Details coming soon...',
            'is_published' => false
        ],
        [
            'id' => 1,
            'title' => 'React Movie App',
            'description' => '...',
            'is_published' => false
        ],
        [
            'id' => 3,
            'title' => 'Laravel Portfolio Back-End',
            'description' => 'In progress.  Stay tuned.',
            'is_published' => false
        ]
    ];

    return view('projects.index')
            ->with("projects", $projects);
}

public function show($project)
{
    $project = "testtttttttttt";
    return view('projects.project', ['project' => $project]);
}

public function home()
{
    $message= "Welcome Home";
    return view('projects.home', ['message' => $message]);
}

public function about()
{
    $about= "This is About page";
    return view('projects.about', ['about' => $about]);
}
*/