<form action="{{ route('password.update') }}" method="post">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="submit" value="submit">
</form>
{{ var_dump($errors) }}
