@props(['project', 'showBody' => false])

<div class="p-6 m-6 bg-white overflow-hidden shadow sm:rounded-lg flex flex-col justify-between">
    <div>
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
        </div>
        <div>{!! $project->excerpt !!}</div>

        {{-- ////////////////
            add space btw the p elements --}}
        @if ($showBody)
            <div class="[&>p]:pt-4">{!! $project->body !!}</div>
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
