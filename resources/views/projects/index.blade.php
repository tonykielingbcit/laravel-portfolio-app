@props(['project', 'category' => false, "showBackToProjects" => true, "tag" => false])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col flex-1 bg-gray-700 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- @if ($showBackToProjects) --}}
            @if ($category)
                <div class="absolute top-6 left-6 text-[#F5DEB3]">
                    <a href="/projects">
                        ← Back to Projects
                    </a>
                </div>
            @endif

            <div class="p-5 mt-5 bg-white overflow-hidden shadow m-auto rounded-lg">
                @if ($category)
                    <h3><b>{{ $category }}</b> Projects</h3>
                @elseif ($tag)
                    <h3><b>{{ $tag }}</b> Projects</h3>
                @else
                    <h3>Projects</h3>
                @endif
            </div>

            <div class="mt-6 w-full">
                <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mr-8 ml-8 grid-items-center">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>

                {{-- @if (!$category) --}}
                    @if (count($projects))
                        {{-- <div class="text-xs w-full text-right pr-8 text-[#F5DEB3]">{{ count($projects) }} projects to peep.</div> --}}
                        <div class="text-xs mt-4 w-full text-right pr-8">{{ $projects->links() }}</div>
                    @else
                        <div class="text-[#F5DEB3]">Nothing to showcase, yet.</div>
                    @endif
                {{-- @endif --}}
            </div>
        </div>
    </x-slot>
</x-layout>