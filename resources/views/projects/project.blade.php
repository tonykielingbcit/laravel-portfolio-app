{{-- <x-projects.project-card :project="$project" :showBody="true"/> --}}

<x-layout>
    <x-slot name="content">
        {{-- <div class="relative flex items-top align-middle flex-col justify-center bg-gray-700 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> --}}
        <div class="relative bg-gray-700 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- <div class="mt-6 ml-12 text-left w-full text-[#F5DEB3]"> --}}
            {{-- <div class="overflow-hidden w-screen mt-6 ml-12 flex flex-row justify-start text-[#F5DEB3]"> --}}
            <div class="absolute top-6 left-12 text-[#F5DEB3]">
                <a href="/projects">
                    ← Back to Projects
                </a>
            </div>

            <div class="mt-20">
                <div class="w-1/2 m-auto">
                    <x-projects.project-card :project="$project" :showBody="true" />
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>