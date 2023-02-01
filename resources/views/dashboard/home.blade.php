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

<div class="text-center flex gap-6 mx-auto justify-center mt-5">
    <div>
        <a href="{{ route('register') }}">
            <button class="bg-slate-700 text-white px-4 py-2 rounded">Register</button>
        </a>
    </div>


    <div>
        <a href="{{ route('login') }}">
            <button class="bg-slate-700 text-white px-4 py-2 rounded">Login</button>
        </a>
    </div>
</div>

</body>
</html>
