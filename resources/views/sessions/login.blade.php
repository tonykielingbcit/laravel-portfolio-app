<x-layout>
  <x-slot name="content">
    <main class="max-w-lg mx-auto mt-8">
      <h1 class="text-center font-bold text-xl mb-6 text-[#F5DEB3]">Login</h1>
      <form method="POST" action="/login">
        @csrf
        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-[#F5DEB3]">Email</label>
          <input type="text" name="email" id="email" value="{{ old('email') }}" required autofocus
            class="p-[3px] px-2.5 border border-gray-400 rounded p2 w-full">
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-[#F5DEB3]">Password</label>
          <input type="password" name="password" id="password" required
            class="p-[3px] px-2.5 border border-gray-400 rounded p2 w-full">
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6 flex justify-center">
          <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
        </div>
      </form>
    </main>
  </x-slot>
</x-layout>