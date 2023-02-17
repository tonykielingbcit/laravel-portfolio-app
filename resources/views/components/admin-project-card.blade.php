@props(['project', 'showBody' => false, "isAdmin" => false])

{{-- <div class="p-6 m-6 bg-white overflow-hidden shadow sm:rounded-lg flex flex-col"> --}}
<div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg m-3 p-4 flex flex-col">
    <div class="text-xl font-bold">
        <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
    </div>

    <div class="flex flex-row">
        
        <div class="flex flex-col w-1/3">
            <div>
                <div class="flex justify-center pt-8">
                    <img src="{{url('storage/images/projects.png')}}" />
                </div>
            </div>
            <div class="mt-8">
                @if ($project->category)
                    <a href="/categories/{{ $project->category->slug }}">
                        <span>Category: {{ $project->category->name }}</span>
                    </a>
                @endif
            </div>
        </div>

        <div class="w-2/3 flex flex-col justify-center">
            {!! $project->excerpt !!}
        </div>

    </div>
</div>
