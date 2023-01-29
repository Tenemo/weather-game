@extends('layout')

@section('title', 'weather.game - ' . $game_short_id)

@section('content')
<section class="game">
    <form method="POST" action="{{ route('answer.store') }}">
        @csrf
        Round {{ $answers_count }} out of {{ $gameLength }}.
        <p>What is the current temperature in <b>{{ $city }}</b>? Country: <b>{{ $country }}</b>, continent: <b>{{ $continent }}</b>.</p>
        <label for="answer">Answer in celsius:</label>
        <input autocomplete="off" id="answer" class="@error('answer') error-border @enderror" type="number" min="-99" max="99" step="1" required name="answer" value="{{ old('answer') }}">
        @error('answer')
        <div class="error">
            {{ $message }}
        </div>
        @enderror
        <input autocomplete="off" id="answer_id" type="hidden" name="answer_id" value="{{ $answer_id }}">
        <input autocomplete="off" id="game_id" type="hidden" name="game_id" value="{{ $game_id }}">

        <button type="submit" class="btn btn-secondary">Submit answer</button>
    </form>
</section>

@endsection
