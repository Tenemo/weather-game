@extends('layout')

@section('content')
<section class="home">
    <h2>Home page</h2>
    <form method="POST" action="{{ route('play.store') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">New game</button>
    </form>
</section>
@include('highScores', ['highScores' => $highScores])
@endsection
