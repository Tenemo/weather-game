@extends('layout')

@section('title', 'weather.game - users')

@section('content')
<section class="users">
    <table>
        <thead>
            <tr>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
