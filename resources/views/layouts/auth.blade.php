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
    <a class="bg-slate-700 rounded px-12 py-2 text-white my-6 mx-auto mt-6" href="{{ route('dashboard') }}">
        پنل کاربری
    </a>
</div>

@yield('content')

</body>
</html>
