@extends('layout')

@section('title', 'weather.game - ' . $game_short_id . ' result')

@section('content')
<section class="result">
    @csrf
    <p>You have completed {{ $answers_count }} out of {{ $gameLength }} rounds. Congrats, your total score is <b>{{ $score }}</b>!
        Your answers:</p>
    <table>
        <thead>
            <tr>
                <th class="index">#</th>
                <th class="score">Score</th>
                <th class="value">Your answer</th>
                <th class="correct_answer">Actual temperature</th>
                <th class="city">City</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
            <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td>{{ $answer->score }}</td>
                <td>{{ $answer->value }}</td>
                <td>{{ $answer->correct_answer }}</td>
                <td>{{ $answer->city }}, {{ $answer->country }}, {{ $answer->continent }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form class="set-username" method="POST" action="{{ route('play.update', $game_id) }}">
        @csrf
        @method('PUT')
        <label for="username">If you want your score of <b>{{ $score }}</b> to appear on the high scores list, provide a username to save the result under:</label>
        <input class="@error('name') error-border @enderror" id="username" type="text" name="username" value="{{ old('username') }}" required>
        @error('username')
        <div class="error">
            {{ $message }}
        </div>
        @enderror
        <input autocomplete="off" id="game_id" type="hidden" name="game_id" value="{{ $game_id }}">
        <button type="submit" class="btn btn-secondary">Save score</button>
    </form>
    <form method="POST" action="{{ route('play.store') }}" class="try-again">
        @csrf
        <button type="submit" class="btn btn-secondary">Try again</button>
    </form>
</section>
@include('highScores', ['highScores' => $highScores])
@endsection
