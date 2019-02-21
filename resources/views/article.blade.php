@extends('layouts/app')
@section('title')
{{ $post->post_title }}
@endsection
@section('content')
@if ($img != false)
<img class="img-main" src="{{ asset('img/' . $img->post_name) }}">
@endif
<div class="post-main">
    <h3 class="post-author">Author : <a href="/users/{{ $post->author->id }}">{{ $post->author->name }}</a></h3>
    <p class="post-date">(posté {{ $date_to_show }})</p>
    <p>{{ $post->post_content }}</p>
</div>
<br /><br />
<h3 class="comments-title">Comments</h3>
<?php
    $nb_comments = 0;
?>
@foreach ($comments as $comment)
<?php
    $nb_comments++;
    $date_comm = $comment->created_at->diffForHumans();
?>
<div class="post-comment">
<p class="comment-author">{{ $comment->comment_name }}</p>
<p class="comment-date">(posté {{ $date_comm }})</p>
<p>{{ $comment->comment_message }}</p>
</div>
@endforeach
@if ($nb_comments == 0)
<p class="no-comments">(no comments yet)</p>
@endif
@endsection