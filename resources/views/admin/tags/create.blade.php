@props(["tag"])

<x-layout>
    <x-slot name="content">
        <div class="relative m-auto mt-8 bg-gray-700 dark:bg-gray-900 sm:items-center py-6 w-3/4 sm:w-80">
            
            @if ($tag)
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Edit Tag: {{ $tag->name }}</h1>
                <form method="POST" action="/admin/tags/{{ $tag->id }}/edit" enctype="multipart/form-data" class="w-full">
                    @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Create Tag</h1>
                <form method="POST" action="/admin/tags/create" enctype="multipart/form-data" class="w-full">
            @endif

                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') ?? $tag?->name }}" placeholder="Tag's name" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex justify-center">
                    <button type="submit" class="w-1/2 font-bold text-center bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">
                        Submit
                    </button>
                    <div class="w-1/2 text-center font-bold bg-red-600 text-white rounded py-2 px-2 hover:bg-red-500">
                        <a href="/admin">
                            Cancel
                        </a>
                    </div>
                  </div>
            </form>

        </div>
    </x-slot>
</x-layout>
