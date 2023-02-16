@props(['project', 'showBody' => false])

<div class="p-6 m-6 bg-white overflow-hidden shadow sm:rounded-lg flex flex-col justify-between">
    <div>
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        </div>
        
        @if ($showBody)
            <div class="[&>p]:pt-4">{!! $project->body !!}</div>
        @else
            <div>{!! $project->excerpt !!}</div>
        @endif
    </div>
    
    <footer class="mt-5">
        @if ($project->category)
            <a href="/categories/{{ $project->category->slug }}">
                <span>Category: {{ $project->category->name }}</span>
            </a>
        @endif
    </footer>
</div>
