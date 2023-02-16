<header class="px-6 py-5 sticky top-0 left-0 w-full border-12 border-b border-solid bg-gray-400">
    <nav class="md:flex md:justify-between md:items-center">
        <div><a href="/" class="text-xl font-bold uppercase">Home</a></div>

        @auth
            <span class="text-xs font-bold uppercase"> Hello {{ auth()->user()->name }} </span>
            @if (auth()->user()->isAdmin())
                <a href="/admin/projects" class="ml-4 text-s font-bold uppercase">Admin</a>
            @endif
            <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
        @else
            <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
        @endauth

        <div class="mt-8 md:mt-0">
            <a href="/projects" class="text-s font-bold uppercase mr-3">Projects</a>
            <a href="/about" class="text-s font-bold uppercase">About</a>
        </div>
    </nav>
</header>