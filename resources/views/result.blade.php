@extends('layout')

@section('title', 'weather.game ' . $game_short_id . ' result')

@section('content')
<section class="result">
    @csrf
    You have completed {{ $answers_count }} out of {{ $gameLength }} rounds. Congrats, your score is <b>{{ $score }}</b>!
    Your answers:
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
    <form method="POST" action="{{ route('play.store') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">Try again</button>
    </form>
</section>
@include('highScores', ['highScores' => $highScores])
@endsection
