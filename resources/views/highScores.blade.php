<section class="highScores">
    <h4>High scores:</h4>


    @if ($highScores)
    <ol>
        @foreach ($highScores as $highScore)
        <li class="highScore">
            {{ $highScore }}
        </li>
        @endforeach
    </ol>
    @else
    <p>There are no highscores yet</p>
    @endif
</section>
