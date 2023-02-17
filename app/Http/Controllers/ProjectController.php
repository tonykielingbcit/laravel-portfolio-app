<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::all())
            ->with("showBackToProjects", false);
    }

    
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }


    public function listByCategory(Category $category)
    {
        return view('projects.index')
            ->with('projects', $category->projects)
            ->with("category", $category->name);
    }



    public function about()
    {
        $about= "This is About page";
        return view('projects.about', ['about' => $about]);
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