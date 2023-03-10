<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    /* border: 1px solid red; */
    }

    body {
        background: white;
        width: 100%; */
    }

    .hamburger, .close {
        border: none;
        cursor: pointer;
        /* position absolute position the icons relative to the body because they have no position relative parents*/
        position: absolute;
        top: 20px;
        right: 20px;
        width: 36px;
        height: 36px;
    }

    .hamburger {
        /* background: lightcyan; */
        border-radius: 8px;
        display: flex;
    }

    .close {
        /* background: black; */
        background-color: rgb(55 65 81);
    }

    .hamburger img, .close img {
        width: 100%;
        height: 100%;
    }

    .navbar {
        position: absolute;
        /* a higher z-index put navbar above hamburger */
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        /* basic menu styling*/
        list-style: none;
        /* background: black; */
        background-color: rgb(55 65 81);
        display: flex;
        flex-flow: column nowrap;
        justify-content: space-evenly;
        align-items: center;
        /* animate slide up/down */
        transform: translateY(-100%);
        transition: transform 0.2s ease;
    }

    /* :target is called when its anchor id #navbar is called by clicking on the hamburger which has href="#navbar" */

    .navbar:target {
        /* show navbar */
        transform: translateY(0);
    }

    li a {
        display: block;
        font-family: 'Open Sans', sans-serif;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        /* remove default underline and add our own with padding and border bottom */
        text-decoration: none;
        border-bottom: 1px solid black;
        padding-bottom: 0.5rem;
    }

    li a:hover, li a:focus {
        /* show border bottom */
        border-bottom: 1px solid white;
    }
</style>
{{-- https://dev.to/ljcdev/hamburger-css-no-js-2dfa --}}
{{-- hamburguer menu reference --}}

<header class="px-6 py-5 top-0 left-0 w-full border-12 border-b border-solid bg-gray-400">
    <nav class="md:flex md:justify-between md:items-center">

        <div class="flex justify-between w-full">
            <div class="flex hover:cursor-pointer">
                <a href="/">
                    <span class="text-xl font-bold uppercase hover:bg-slate-300 p-2 rounded-md">
                        Home
                    </span>
                </a>

                <div class="hidden md:flex align-middle ml-6 font-bold uppercase hover:cursor-pointer">
                    <a href="/admin/projects">
                        <span class="text-m font-bold ml-6 hover:bg-slate-300 p-2 rounded-md">
                            Projects
                        </span>
                    </a>
                    <a href="/about">
                        <span class="text-m font-bold ml-6 hover:bg-slate-300 p-2 rounded-md">
                            About
                        </span>
                    </a>
                </div>
            </div>

            {{-- second hamburguer menu option --}}
            {{-- it needs the style above, otherwise, need to comment it out --}}
            <div class="md:hidden">
                <ul class="navbar" id="navbar">
                    <a href="/admin/projects" 
                        class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                            Projects
                    </a>
                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="/admin" 
                                class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                                    Admin
                            </a>
                        @endif
                        <a href="/logout" 
                            class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                                Logout
                        </a>
                    @else
                        <a href="/register" 
                            class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                                Register
                        </a>
                        <a href="/login" 
                            class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                                Log In
                        </a>
                    @endauth
                    <a href="/about" 
                        class="block py-4 text-2xl w-full text-center font-bold text-gray-400 hover:bg-gray-400 hover:text-red-600">
                            About
                    </a>
                    <a class="close" href="#">
                    <img src="https://ljc-dev.github.io/testing0/ham-close.svg" alt="close">
                    </a>
                </ul>
                <a class="hamburger bg-gray-400" href="#navbar">
                    <img src="https://ljc-dev.github.io/testing0/ham.svg" alt="menu">
                </a>
            </div>

            
            
            <div>
                @auth
                <span class="text-m font-bold"> {{ auth()->user()->name }} </span>
                @endauth
            </div>
            
            {{-- need this for the second hamburguer menu, so it creates an element to position the name right in the center --}}
            <div class="md:hidden text-transparent flex">1234567890</div>

            {{-- first hamburguer menu option --}}
            {{-- do not need the style on the very top --}}
            {{-- <div class="md:hidden flex">
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
              </div>   --}}
        


            
            <div class="hidden md:flex align-middle font-bold uppercase hover:cursor-pointer">
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="/admin"> 
                            <span class="text-m font-bold ml-6 hover:bg-slate-300 p-2 rounded-md">
                                Admin
                            </span>
                        </a>
                    @endif

                    <a href="/logout">
                        <span class="text-m font-bold ml-6 hover:bg-slate-300 p-2 rounded-md">
                            Logout
                        </span>
                    </a>
                @else
                    <a href="/register">
                        <span class="mr-6 text-m font-bold ml-6 hover:bg-slate-300 p-2 rounded-md uppercase">
                            Register
                        </span>
                    </a>
                    <a href="/login">
                        <span class="text-m font-bold mr-6 hover:bg-slate-300 p-2 rounded-md uppercase">
                            Log In
                        </span>
                    </a>
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