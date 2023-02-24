@props(["user" => null])

<x-layout>
    <x-slot name="content">
        <div class="relative m-auto mt-8 bg-gray-700 dark:bg-gray-900 sm:items-center py-6 w-3/4 sm:w-80">
            @if ($user)
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Edit User: {{ $user->name }}</h1>
                <form method="POST" action="/admin/users/{{ $user->id }}/edit" enctype="multipart/form-data" class="w-full">
                    @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3 text-[#F5DEB3]">Create User</h1>
                <form method="POST" action="/admin/users/create" enctype="multipart/form-data" class="w-full">
            @endif

                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') ?? $user?->name }}" placeholder="User's name" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') ?? $user?->email }}" placeholder="User's email" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if (!$user)
                    <div class="mb-4">
                        <label for="password" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Password</label>
                        <input type="password" name="password" id="password" placeholder="User's Password" required
                            class="border border-gray-400 rounded p-2 w-full">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block mb-1 uppercase font-bold text-xs text-[#F5DEB3]">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            placeholder="Confirm Password" required class="border border-gray-400 rounded p-2 w-full">
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

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


{{-- @props(["category"])

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
</x-layout> --}}
