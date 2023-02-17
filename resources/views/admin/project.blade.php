@props(['project', 'showBody' => false, "isAdmin" => false])

{{-- <div class="p-6 m-6 bg-white overflow-hidden shadow sm:rounded-lg flex flex-col"> --}}
<x-layout>
    <x-slot name="content">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg mt-8 p-4 flex flex-col align-middle justify-center">
                <div class="text-xl font-bold">
                    <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
                </div>

                <div class="flex justify-center pt-8">
                    <img src="{{url('storage/images/projects.png')}}" />
                </div>

                <div class="w-full flex flex-col justify-center [&>p]:pt-4">
                    {!! $project->body !!}
                </div>

                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
