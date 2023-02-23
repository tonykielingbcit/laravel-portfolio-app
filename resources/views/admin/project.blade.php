@props(['project', 'showBody' => false, "isAdmin" => false])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col items-center justify-center">

            {{-- @if ($showBackToProjects) --}}
                <div class="absolute top-6 left-6 text-[#F5DEB3]">
                    <a href="/projects">
                        ← Back to Projects
                    </a>
                </div>
            {{-- @endif --}}

            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg mt-16 p-4 flex flex-col align-middle justify-center">
                <div class="text-xl font-bold">
                    <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
                </div>

                <div class="flex justify-center pt-8">
                    {{-- <img src="{{url('storage/images/projects.png')}}" /> --}}
                    @php($temp = $project->image ?? "images/image-default.png")
                    <img src="{{ url('storage/'.$temp) }}" class="flex items-center justify-center w-3/4" />
                </div>

                <div class="w-full flex flex-col justify-center [&>p]:pt-4 mt-8">
                    {!! $project->body !!}
                </div>

                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
