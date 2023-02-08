@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-col w-3/4 mx-auto mt-12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-b">
                        <tr class="bg-slate-700 text-white rounded">
                            <th scope="col" class="text-sm text-white font-medium text-gray-900 px-6 py-4 text-left">
                                <p class="text-white">#</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <p class="text-white">Name</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <p class="text-white">Slug</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <p class="text-white">Edit</p>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <p class="text-white">Delete</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr class="border-b">
                                <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $role['id'] }}
                                </td>
                                <td class="px-6 text-left font-semibold py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('roles.show' , $role['id']) }}">
                                        {{ $role['name'] }}
                                    </a>
                                </td>
                                <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $role['slug'] }}
                                </td>

                                {{--                            Delete and Edit section --}}
                                <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('roles.edit' , $role['id']) }}">
                                        <p class="text-xl text-green-500"><i class="fa fa-edit"></i></p>
                                    </a>
                                </td>
                                <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <form action="{{ route('roles.destroy' , $role['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa fa-trash text-xl text-red-500"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection()
