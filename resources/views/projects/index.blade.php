@props(['project', 'category' => false, "showBackToProjects" => true, "tag" => false, 'featured' => []])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col flex-1 bg-gray-700 dark:bg-gray-900 items-center py-4 sm:pt-0">
            {{-- @if ($showBackToProjects) --}}
            @if ($category)
                <div class="absolute top-6 left-6 text-[#F5DEB3]">
                    <a href="/projects">
                        ← Back to Projects
                    </a>
                </div>
            @endif

            <div class="p-5 mt-8 bg-white overflow-hidden shadow rounded-lg text-center w-48 font-bold text-2xl">
                @if ($category)
                    <h3><b>{{ $category }}</b> Projects</h3>
                @elseif ($tag)
                    <h3><b>{{ $tag }}</b> Projects</h3>
                @else
                    <h3>Projects</h3>
                @endif
            </div>

            <div class="mt-6 w-full">
                @if (count($featured) > 0)
                    <div class="flex flex-col">
                        <div class="text-center font-bold text-white text-2xl">Featured Projects</div>
                        <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mr-8 ml-8 grid-items-center">
                            @foreach ($featured as $featur)
                                <x-projects.project-card :project="$featur" :featured="true" />
                            @endforeach
                        </section>
                    </div>
                @endif

                @if (count($featured) > 0)
                    <div class="flex flex-col">
                        <div class="text-center font-bold text-white text-2xl">Regular Projects</div>
                @endif
                <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mr-8 ml-8 grid-items-center">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                    @if (count($featured) > 0)
                        </div>
                    @endif
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