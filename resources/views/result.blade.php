@extends('layout')

@section('title', 'weather.game ' . $game_short_id . ' result')

@section('content')
<section class="result">
    @csrf
    You have completed {{ $answers_count }} out of {{ $gameLength }} rounds. Congrats, your score is {{ $score }}!
    Your answers:
    <table>
        <thead>
            <tr>
                <th class="index">Question</th>
                <th class="value">Your answer</th>
                <th class="correct_answer">Actual temperature</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
            <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td>{{ $answer->value }}</td>
                <td>{{ $answer->correct_answer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" action="{{ route('play.store') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">Try again</button>
    </form>
</section>

@endsection
