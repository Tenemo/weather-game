@extends('layout')

@section('content')
<h2>Home page</h2>
<p>This is the home page.</p>
<form method="POST" action="{{ route('play.store') }}">
    @csrf
    <button type="submit" class="btn btn-secondary">New game</button>
</form>
@endsection
