<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function store()
    {
        // validate
        $attributes = request()->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $projects = auth()->user()->projects()->create($attributes);

        // redirect
        return redirect($projects->path());
    }

    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        if(auth()->user()->isNot($project->owner))
        {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function create(Project $project)
    {
        return view('projects.create');
    }
}
