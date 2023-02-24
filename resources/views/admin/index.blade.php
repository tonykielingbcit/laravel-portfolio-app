{{-- @props(['projects', "users", 'category' => false, "showBackToProjects" => true]) --}}
@props(['projects', "users", 'category' => false, "showBackToProjects" => true, "categories", "tag" => false])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col flex-1 bg-gray-700 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <h1 class="text-[#F5DEB3] text-center mt-6 mb-4 text-3xl font-bold">ADMIN</h1>
            {{-- https://www.kindacode.com/snippet/how-to-create-striped-tables-with-tailwind-css/ --}}
            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 py-2">

                <h1 class="text-2xl font-bold mt-2">Projects</h1>
                <div class="flex justify-end mb-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        <a href="/admin/projects/create">
                            Create Projects
                        </a>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($projects as $project)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">
                                <a href="/admin/projects/{{ $project->slug }}">{{ $project->title }}</a>
                            </td>
                            <td class="p-2 text-[blue] hover:font-black">
                                <a href="/admin/projects/{{ $project->id }}/edit">
                                    Edit
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600">
                                        Delete 
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 py-2 mt-10">
                <h1 class="text-2xl font-bold mt-2">Categories</h1>
                <div class="flex justify-end mb-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        <a href="/admin/categories/create">
                            Create Categories
                        </a>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($categories as $category)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">
                                <a href="/admin/categories/{{ $category->id }}/edit">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td class="p-2 text-[blue] hover:font-black">
                                <a href="/admin/categories/{{ $category->id }}/edit">
                                    Edit
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                <form method="POST" action="/admin/categories/{{$category->id}}/delete" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600">
                                        Delete 
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 pt-2 mt-10 mb-3">
                <h1 class="text-2xl font-bold mt-2">Tags</h1>
                <div class="flex justify-end mb-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        <a href="/admin/tags/create">
                            Create Tags
                        </a>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($tags as $tag)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">
                                <a href="/admin/tags/{{ $tag->id }}/edit">
                                    {{ $tag->name }}
                                </a>
                            </td>
                            <td class="p-2 text-[blue] hover:font-black">
                                <a href="/admin/tags/{{ $tag->id }}/edit">
                                    Edit
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                <form method="POST" action="/admin/tags/{{$tag->id}}/delete" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600">
                                        Delete 
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 py-2 mt-10">
                <h1 class="text-2xl font-bold mt-2">Users</h1>
                <div class="flex justify-end mb-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        <a href="/admin/users/create">
                            Create Users
                        </a>
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($users as $user)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">
                                <a href="/admin/users/{{ $user->id }}/edit">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td class="p-2 text-[blue] hover:font-black">
                                <a href="/admin/users/{{ $user->id }}/edit">
                                    Edit
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                <form method="POST" action="/admin/users/{{$user->id}}/delete" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600">
                                        Delete 
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
        </div>
    </x-slot>
</x-layout>
