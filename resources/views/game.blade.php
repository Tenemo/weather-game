@extends('layout')

@section('content')
<h2>Game</h2>
<form method="POST" action="{{ route('answer.store') }}">
    @csrf
    <label for="answer">Answer in celsius:</label>
    <input id="answer" class="@error('answer') error-border @enderror" type="text" name="answer" value="{{ old('title') }}">
    @error('title')
    <div class="error">
        {{ $message }}
    </div>
    @enderror

    <button type="submit" class="btn btn-secondary">Submit answer</button>
</form>
@endsection
