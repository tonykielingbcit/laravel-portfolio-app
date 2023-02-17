@props(['projects', "users", 'category' => false, "showBackToProjects" => true])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col align-middle bg-gray-700 dark:bg-gray-900 sm:items-center py-6">

                @foreach ($projects as $project)
                    {{-- <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg"> --}}
                        <x-admin-project-card :project="$project" :isAdmin="true" />
                    {{-- </div> --}}
                @endforeach

        </div>
    </x-slot>
</x-layout>
