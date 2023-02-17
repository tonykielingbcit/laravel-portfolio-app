<header class="px-6 py-5 sticky top-0 left-0 w-full border-12 border-b border-solid bg-gray-400">
    <nav class="md:flex md:justify-between md:items-center">

        <div>
            <a href="/" class="text-xl font-bold uppercase">Home</a>

            @auth
                <a href="/projects" class="text-m font-bold uppercase ml-6">Projects</a>
            @endauth

            <a href="/about" class="text-m font-bold uppercase ml-6">About</a>

        </div>
        
        <div>
            @auth
                <span class="text-m font-bold uppercase"> {{ auth()->user()->name }} </span>

                @if (auth()->user()->isAdmin())
                    <a href="/admin/projects" class="text-m font-bold uppercase ml-6">Admin</a>
                @endif

                <a href="/logout" class="ml-6 text-m font-bold uppercase">Logout</a>
            @else
                <a href="/register" class="mr-6 text-m font-bold uppercase">Register</a>
                <a href="/login" class="text-m font-bold uppercase">Log In</a>
            @endauth

        </div>
    </nav>
</header>