@extends('layout')

@section('title', 'weather.game - log in')

@section('content')
<section class="login">
    <h4>Login</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label>
        <input class="form-control @error('email') error-border @enderror" type="text" name="email" value="{{ old('email') }}" required>
        @error('email')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

        <label>Password</label>
        <input class="form-control @error('password') error-border @enderror" type="password" name="password" required>
        @error('password')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

        <button class="btn btn-secondary" type="submit">Login</button>
    </form>
    @if (session('success'))
    <div class="flash-success">
        {{ session('success') }}
    </div>
    @endif
</section>
@endsection
