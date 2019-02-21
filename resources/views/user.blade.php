@extends('layouts/app')
@section('title')
Users
@endsection
@section('content')
<div class="contact-list">
    <a href="/users">Users list</a><br /><br />
</div>
<div>
    <h3>{{ $user->name }}</h3>
    <p>{{ $user->email }}</p>
    <p>Enregistré {{ $date_to_show }}.
</div>
@endsection