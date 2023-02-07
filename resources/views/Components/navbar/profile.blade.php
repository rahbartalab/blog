<nav class="bg-slate-700 text-white px-4 py-2">
    <div class="flex gap-3 justify-between">
        {{--        links --}}
        <div class="flex gap-12">
            <a href="{{ route('profile.index') }}">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</a>
            <a href="{{ route('dashboard') }}">پنل کاربری</a>
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" class="bg-slate-700 text-white rounded cursor-pointer" value="logout">
        </form>


    </div>
</nav>
