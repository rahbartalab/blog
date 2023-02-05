<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<div class="text-center p-12 flex justify-center gap-12">
    <p>WELCOME {{ $user->username }}</p>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" class="bg-slate-700 text-white px-4 py-2 rounded cursor-pointer" value="logout">
    </form>
</div>

</body>
</html>
