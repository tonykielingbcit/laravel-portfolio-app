@props(['project', "users", 'category' => false, "showBackToProjects" => true, "flagEdit" => false])
{{-- @props(['project', "users", "showBackToProjects" => true]) --}}

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col items-center bg-gray-700 dark:bg-gray-900 sm:items-center py-6">
            
            @if ($project)
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Edit Project: {{ $project->title }}</h1>
                <form method="POST" action="/admin/projects/{{ $project->id }}/edit" enctype="multipart/form-data"
                    class="mt-2 w-11/12 flex flex-col items-center sm:border sm:border-gray-500 sm:w-3/4 rounded-lg lg:w-1/2 xl:w-2/5">
                    @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Create Project</h1>
                <form method="POST" action="/admin/projects/create" enctype="multipart/form-data"
                    class="mt-2 w-11/12 flex flex-col items-center sm:border sm:border-gray-500 sm:w-3/4 rounded-lg lg:w-1/2 xl:w-2/5">
            @endif

                @csrf
                <div class="mb-4 mt-4 w-10/12 ">
                    <label for="title" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required 
                        placeholder="Project's Title" class="border border-gray-400 rounded p-2 w-full">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 w-10/12 ">
                    <label for="excerpt" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Excerpt</label>
                    <textarea rows="2" name="excerpt" id="excerpt" required placeholder="Short Description" 
                    class="border border-gray-400 rounded p-2 w-full">
                        {{ old('excerpt') ?? $project?->excerpt }}
                    </textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 w-10/12 ">
                    <label for="body" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Body</label>
                    <textarea rows="5" name="body" id="body" placeholder="Long Description" required
                        class="border border-gray-400 rounded p-2 w-full">{{ old('body') ?? $project?->body }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 w-10/12 ">
                    <label for="url" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Url</label>
                    <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url }}" placeholder="Project's URL"
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 w-10/12 ">
                    <label for="published_date" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Published Date</label>
                    <input type="date" name="published_date" id="published_date" 
                        value="{{ old('published_date') ?? $project?->published_date }}"
                        class="border border-gray-400 rounded p-2 w-48">
                    @error('published_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-10/12 my-6 flex align-middle">
                    <label for="featured" class="block mr-2 uppercase font-bold text-xs text-[#F5DEB3]">Featured</label>
                    <input type="checkbox" name="featured" id="featured" 
                        {{ $project->featured ? 'checked' : '' }}
                        {{-- value="{{ $project->featured ?? old('featured') ?? checked }}"> --}}
                        value="foo">
                </div>




                <div class="mb-4 w-10/12 ">
                    <label for="thumb" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Thumbnail</label>
                    <input type="file" name="thumb" id="thumb"
                      value="{{ old('thumb') ?? $project?->thumb }}"
                      class="border border-gray-400 rounded p-2 w-full text-gray-400">
                    @error('thumb')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-4 w-10/12 ">
                    <label for="image" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Image</label>
                    <input type="file" name="image" id="image"
                      value="{{ old('image') ?? $project?->image }}"
                      class="border border-gray-400 rounded p-2 w-full text-gray-400">
                    @error('image')
                      <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                  </div>

                <div class="m-4 flex justify-center">
                    <select name="category_id" id="category_id" class="w-64 text-center py-1 rounded-md">
                        <option value="" selected disabled>Select a Category</option>
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id ?? $project?->category_id }}" 
                                {{-- @if ($category->id == old('category_id')) 
                                    selected 
                                @endif --}}
                                {{ $category->id == old('category_id') ? 'selected' : ($project ? ($category->id == $project->category_id ? 'selected' : '') : '') }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <h2 class="text-center font-bold text-2xl text-gray-400 mt-4">Check Tags</h2>
                <div class="flex flex-wrap mb-6">
                    @foreach ($tags as $tag)
                        <label class="px-4 text-gray-400">
                            <input type="checkbox" name="tags[]" id="tags" value="{{ $tag->id }}"
                                @if (old('tags') && in_array($tag->id, old('tags')))
                                        checked
                                @elseif ($project && $project->tags)
                                    @foreach ($project->tags as $projectTag)
                                        @if ($tag->id == $projectTag->id)
                                            checked
                                        @endif
                                    @endforeach
                                @endif
                            >
                            {{$tag['name']}}
                        </label>
                    @endforeach
                </div>

                <div class="mb-6 flex justify-center w-40">
                    <button type="submit" class="w-full bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">
                        {{ $flagEdit ? "Save" : "Submit"}}
                    </button>
                </div>
            </form>

        </div>
    </x-slot>
</x-layout>
