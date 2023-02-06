<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<div class="text-center p-12 gap-12">
    <p class="mb-12">ساخت نقش جدید</p>

    <a class="bg-slate-700 rounded px-12 py-2 text-white" href="{{ route('dashboard') }}">پنل کاربری</a>

    <form action="/roles" method="post">
        @csrf
        <div class="flex justify-center items-start gap-12">
            <div class="mt-12 flex flex-col gap-3">
                <label for="name" class="block">نام نقش را وارد کنید</label>
                <input id="name" name="name" type="text" class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                @error('name')
                <div class="alert alert-danger text-red-600">{{ $message }}</div>
                @enderror
                <input type="submit" value="افزودن" class="bg-slate-700 text-white rounded px-4 py-2 cursor-pointer">
            </div>

            <div class="mt-16">
                @foreach($permissions as $permission)
                    <div class="flex items-center mb-4 gap-2">
                        <input id="default-checkbox" type="checkbox" value="{{ $permission['id'] }}"
                               {{ in_array($permission['id'] , old('permissions') ?? []) ? 'checked' : '' }}
                               name="permissions[]"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $permission['fa-name'] }}
                        </label>
                    </div>

                @endforeach
                @error('permissions')
                <div class="alert alert-danger text-red-600">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </form>

</div>

</body>
</html>
