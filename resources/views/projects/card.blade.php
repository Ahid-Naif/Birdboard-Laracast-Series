<div class="bg-white p-3 rounded-lg shadow-sm" style="height: 200px">
    <h3 
    class="font-normal text-xl py-3 -ml-4 border-l-4 border-blue-200 pl-4">
    <a 
        href="{{ $project->path() }}" 
        class="text-black no-underline">
        {{ str_limit($project->title, 15) }}</a></h3>
        
    <div class="text-gray-500">{{ str_limit($project->description, 70) }}</div>
</div>