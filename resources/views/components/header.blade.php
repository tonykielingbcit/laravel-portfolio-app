<header class="px-6 py-5 top-0 left-0 w-full border-12 border-b border-solid bg-gray-400">
    <nav class="md:flex md:justify-between md:items-center">

        <div class="flex justify-between w-full">
            <div class="flex">
                <a href="/" class="text-xl font-bold uppercase">Home</a>

                {{-- <div class="sm:max-md:hidden flex align-middle ml-6" --}}
                <div class="hidden md:flex align-middle ml-6 font-bold uppercase hover:cursor-pointer"
                    <a href="/admin/projects" class="text-m font-bold uppercase ml-6">Projects</a>
                    <a href="/about" class="text-m font-bold uppercase ml-6">About</a>
                </div>
            </div>

            <div>
                @auth
                    <span class="text-m font-bold"> {{ auth()->user()->name }} </span>
                @endauth
            </div>

            <div class="md:hidden flex">
                <div class="relative">
                  <button 
                    class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 focus:outline-none"
                    onclick="toggleDropdown()"
                  >
                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <title>Menu</title>
                      <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                  </button>
                  <div 
                    id="dropdown"
                    class="absolute z-50 top-30 right-0  bg-gray-200 mt-2 origin-top-right rounded-sm w-48"
                    style="visibility: hidden;"
                  >
                    <a href="/admin/projects" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">Projects</a>
                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="/admin" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">Admin</a>
                        @endif
                        <a href="/logout" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">Logout</a>
                    @else
                        <a href="/register" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">Register</a>
                        <a href="/login" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">Log In</a>
                    @endauth
                    <a href="/about" class="block px-3 py-2 text-gray-700 hover:bg-gray-400">About</a>
                  </div>
                </div>
              </div>  
        {{-- </div> --}}


            
            <div class="hidden md:flex align-middle font-bold uppercase hover:cursor-pointer"
                @auth
                    {{-- <span class="text-m font-bold uppercase"> {{ auth()->user()->name }} </span> --}}

                    @if (auth()->user()->isAdmin())
                        <a href="/admin"> 
                            <span class="text-m font-bold ml-6 hover:bg-slate-300 p-2">
                                Admin
                            </span>
                        </a>
                    @endif

                    <a href="/logout" class="ml-6 text-m font-bold uppercase">Logout</a>
                @else
                    <a href="/register" class="mr-6 text-m font-bold uppercase">Register</a>
                    <a href="/login" class="text-m font-bold uppercase">Log In</a>
                @endauth

            </div>
        </div>
    </nav>
</header>

<script>
    function toggleDropdown() {
      const dropdown = document.getElementById("dropdown");
      if (dropdown.style.visibility === "hidden") {
        dropdown.style.visibility = "visible";
      } else {
        dropdown.style.visibility = "hidden";
      }
    }
</script>