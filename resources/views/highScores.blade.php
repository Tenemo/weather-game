<section class="highScores">
    <h4>High scores:</h4>
    @if ($highScores)
    <table>
        <thead>
            <tr>
                <th class="index">#</th>
                <th class="score">Score</th>
                <th class="user">User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($highScores as $score)
            <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>{{ $score->score }}</td>
                <td>{{ $score->username }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>There are no highscores yet</p>
    @endif
</section>
