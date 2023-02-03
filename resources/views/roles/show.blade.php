<html dir="rtl" lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Show Role</title>
</head>
<body>
<div class="text-center">
    <div class="border-b flex gap-12 justify-center mt-12">
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
    </div>
    <ol class="mt-5">
        @foreach($role->permissions as $permission)
            <li>
                {{ $permission['name'] }}
            </li>
        @endforeach
    </ol>
</div>

</body>
</html>
