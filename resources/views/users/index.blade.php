<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Roles list</title>
</head>
<body>
<div class="text-center p-12">
    <a class="bg-slate-700 rounded px-12 py-2 text-white my-6 mx-auto mt-6" href="{{ route('dashboard') }}">پنل
        کاربری</a>
</div>


<div class="flex flex-col w-3/4 mx-auto mt-12">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead class="border-b">
                    <tr class="bg-slate-700 text-white rounded">
                        <th scope="col" class="text-sm text-white font-medium text-gray-900 px-6 py-4 text-left">
                            <p class="text-white">نام</p>
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            <p class="text-white">نام خانوادگی</p>
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            <p class="text-white">نقش</p>
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            <p class="text-white">ویرایش</p>
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            <p class="text-white">حذف</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-6 text-left font-semibold py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ route('users.show' , $user['id']) }}">
                                    {{ $user['first_name'] }}
                                </a>
                            </td>
                            <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $user['last_name'] }}
                            </td>

                            {{--                            Delete and Edit section --}}
                            <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ isset($user->roles[0]) ? route('roles.show' , $user->roles[0]->id) : '' }}">
                                    <p class="text-xl">
                                        {{ isset($user->roles[0]) ? $user->roles[0]->name : 'بدون نقش' }}
                                    </p>
                                </a>
                            </td>
                            <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a class="text-green-500 text-xl" href="{{ route('users.edit' , $user['id']) }}"><i
                                        class="fa fa-edit"></i></a>
                            </td>
                            <td class="px-6 text-left py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <form action="{{ route('users.destroy' , $user['id']) }}" method="post">
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
