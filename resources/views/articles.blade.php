@extends('layouts/app')
@section('title')
Articles
@endsection
@section('content')
<ul>
@foreach ($posts as $post)
    <li><a href="articles/{{ $post->post_name }}">{{ $post->post_title }}</a></li>
@endforeach
</ul>
@endsection