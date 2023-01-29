@extends('layout')

@section('content')
<section class="home">
    <p>The goal of this game is to guess the current temperature in randomly selected cities from all over the world with population of at least 200,000.</p>
    <form method="POST" action="{{ route('play.store') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">New game</button>
    </form>
</section>
@include('highScores', ['highScores' => $highScores])
@endsection
