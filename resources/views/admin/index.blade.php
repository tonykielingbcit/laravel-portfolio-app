{{-- @props(['projects', "users", 'category' => false, "showBackToProjects" => true]) --}}
@props(['projects', "users", 'category' => false, "showBackToProjects" => true, "categories"])

<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col flex-1 bg-gray-700 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <h1 class="text-[#F5DEB3] text-center mt-6 mb-4 font-black">ADMIN</h1>
            {{-- https://www.kindacode.com/snippet/how-to-create-striped-tables-with-tailwind-css/ --}}
            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 py-2">

                <h1 class="font-bold">Projects</h1>
                <div class="flex justify-end my-3">
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
                <h1 class="font-bold">Users</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        Create Users
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($users as $user)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">{{ $user->name }}</td>
                            <td class="p-2 text-[blue] hover:font-black">
                                Edit
                                <i class="fas fa-edit"></i>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                Delete <span class="glyphicon glyphicon-trash"> 
                                    <i class="fas fa-trash-alt"></i>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="w-full md:w-3/4 lg:w-1/2 bg-slate-300 rounded-lg px-4 py-2 mt-10">
                <h1 class="font-bold">Categories</h1>
                <div class="flex justify-end my-3">
                    <button class="rounded-md bg-green-700 text-white font-black py-3 px-6">
                        Create Categories
                    </button>
                </div>
                <table class="table-auto w-full my-2.5">
                    @foreach ($categories as $category)
                        <tr class="even:bg-amber-100 odd:bg-blue-100">
                            <td class="p-2 w-2/3 font-semibold">{{ $category->name }}</td>
                            <td class="p-2 text-[blue] hover:font-black">
                                Edit
                                <i class="fas fa-edit"></i>
                            </td>
                            <td class="p-2 text-red-600 hover:font-black">
                                Delete <span class="glyphicon glyphicon-trash"> 
                                    <i class="fas fa-trash-alt"></i>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </x-slot>
</x-layout>