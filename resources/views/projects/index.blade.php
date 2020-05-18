@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-3">
        <a href="/projects/create">New Project</a>
    </div>

    <div class="flex">
        @forelse ($projects as $project)
            <div class="bg-white mr-4 p-5 rounded shadow w-1/3" style="height: 200px">
                <h3 class="font-normal text-xl py-4">{{ str_limit($project->title, 20) }}</h3>
                
                <div class="text-gray-500">{{ str_limit($project->description, 70) }}</div>
            </div>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </div>
@endsection