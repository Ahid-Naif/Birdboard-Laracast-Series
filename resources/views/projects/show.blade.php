@extends('layouts.app')
@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-500 text-sm font-normal">
                <a href="/projects" 
                   class="text-gray-500 text-sm font-normal no-underline">
                   My Projects</a> / {{ $project->title }}
            </p>

            <a href="/projects/create" 
            class="bg-blue-300 no-underline text-white 
                rounded-lg text-sm py-2 px-3"
            style="box-shadow: 0 2px 7px #b0eaff">
            New Project</a>
        </div>
    </header>
    
    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Tasks</h2>
                    
                    @forelse ($project->tasks as $task)
                    <div class="bg-white p-3 rounded-lg shadow-sm mb-3">
                        <form method="POST" action="{{ $task->path() }}">
                            @method('PATCH')
                            @csrf

                            <div class="flex">
                                <input name="body" value="{{ $task->body }}"
                                    class="w-full {{ $task->completed ? 'text-gray-500' : '' }}">
                            
                                <input name="completed" type="checkbox"
                                    onChange="this.form.submit()"
                                    {{ $task->completed ? 'checked' : '' }}>
                            </div>
                        </form>
                    </div>
                    @empty
                        <div>No tasks added yet!</div>
                    @endforelse              
                </div>

                <div>
                    <h2 class="text-lg text-gray-500 font-normal">General Notes</h2>
                    <textarea 
                        class="bg-white p-3 rounded-lg shadow-sm w-full"
                        style="min-height: 200px">
                        Lorem ipsum</textarea>
                </div>
            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects/card')
            </div>
        </div>
    </main>
@endsection