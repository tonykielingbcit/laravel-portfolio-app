@props(['project', 'showBody' => false, "isAdmin" => false])

<div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg m-3 p-4 flex flex-col">
    <div class="text-xl font-bold">
        <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
    </div>

    <div class="flex flex-row">
        
        <div class="flex flex-col w-1/3">
            <div>
                <div class="flex justify-center pt-8">
                    @php($temp = $project->thumb ?? "images/thumb-default.png")
                    <a href="/admin/projects/{{ $project->slug }}" class="flex justify-center max-w-[50%]">
                        <img src="{{ url('storage/'.$temp) }}" />
                    </a>
                </div>
            </div>
            <div class="mt-8">
                @if ($project->category)
                    <a href="/categories/{{ $project->category->slug }}">
                        <span>Category: {{ $project->category->name }}</span>
                    </a>
                @endif
            </div>

            @if (count($project->tags))
                <p class="mr-1"><b>Tags: </b>
                    @foreach ($project->tags as $tag)
                        <span class="mr-1">
                            <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                        </span>
                    @endforeach
                </p>
            @endif

        </div>

        <div class="w-2/3 flex flex-col justify-center">
            {!! $project->excerpt !!}
        </div>

    </div>
</div>
