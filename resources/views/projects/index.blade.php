@props(['project', 'category' => false])

<x-layout>
    <x-slot name="content">
        {{-- <div class="relative flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"> --}}
        <div class="relative flex flex-col flex-1 bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if ($category)
                <div class="p-5 mt-5 bg-white overflow-hidden shadow sm:rounded-lg">
                    <h3>{{ $category }} Projects</h3>
                </div>
            @endif
            
            <div class="mt-5">
                <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>

                @if (count($projects))
                    <div class="text-xs w-full text-right">{{ count($projects) }} projects to peep.</div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif

            </div>
        </div>
    </x-slot>
</x-layout>