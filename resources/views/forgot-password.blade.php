<form action="/forgot-password" method="post">
    @csrf

    <label for="">email</label>
    <input name="email" type="email">
    <input type="submit" value="RESET">
    @error('email')
    {{ $message }}
    @enderror
</form>

@php var_dump(session()->all()) @endphp
