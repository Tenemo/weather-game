@extends('layout')

@section('content')
<section class="home">
    <p>The goal of the game is to guess the current temperature in a randomly selected city from all over the world with population of 200,000 or more.</p>
    <form method="POST" action="{{ route('play.store') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">New game</button>
    </form>
</section>
@include('highScores', ['highScores' => $highScores])
@endsection
