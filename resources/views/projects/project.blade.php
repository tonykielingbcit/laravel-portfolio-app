{{-- <x-projects.project-card :project="$project" :showBody="true"/> --}}

<x-layout>
    <x-slot name="content">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> --}}
        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- <H1>this is PROJECT blade</h1> --}}
            {{-- <h2>Project: {{ $project }}</h2> --}}
            <x-projects.project-card :project="$project" :showBody="true" />
        </div>
    </x-slot>
</x-layout>