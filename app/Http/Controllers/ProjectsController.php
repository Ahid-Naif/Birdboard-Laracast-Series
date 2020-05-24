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

        $project = auth()->user()->projects()->create($attributes);

        // redirect
        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function index()
    {
        $projects = auth()->user()->projects()->orderBy('updated_at', 'desc')->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function create(Project $project)
    {
        return view('projects.create');
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $project->update($attributes);

        return redirect($project->path());
    }
}
