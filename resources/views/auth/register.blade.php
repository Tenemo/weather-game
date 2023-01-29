@extends('layout')

@section('title', 'weather.game - register account')

@section('content')
<section class="register">
    <h4>Register</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Name</label>
        <input class="form-control @error('name') error-border @enderror" type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

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

        <button class="btn btn-secondary" type="submit">Register</button>

        If you already have an account:
        <a href="{{ route('login') }}">
            login
        </a>
    </form>
</section>
@endsection
