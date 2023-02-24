@props(["category"])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col align-middle bg-gray-700 dark:bg-gray-900 sm:items-center py-6">
            
            @if ($category)
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Edit Category: {{ $category->name }}</h1>
                <form method="POST" action="/admin/categories/{{ $category->id }}/edit" enctype="multipart/form-data">
                    @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Create Category</h1>
                <form method="POST" action="/admin/categories/create" enctype="multipart/form-data">
            @endif

                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') ?? $category?->name }}" 
                        placeholder="Category's name" required class="border border-gray-400 rounded p-2 w-full">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex justify-center">
                    <button type="submit" class="bg-green-700 text-white rounded py-2 px-2 hover:bg-green-600">
                        Submit
                    </button>
                    <a href="/admin">
                        <div class="bg-red-600 text-white rounded py-2 px-2 hover:bg-red-500">
                            Cancel
                        </div>
                    </a>
                  </div>
            </form>

        </div>
    </x-slot>
</x-layout>
