@extends('layouts/app')
@section('title')
Admin - Articles
@endsection
@section('content')
<table class='tab-admin'>
    <tr>
        <td>Title</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
@foreach ($posts as $post)
    <tr>
        <td><a href="articles/{{ $post->id }}">{{ $post->post_title }}</a></td>
        <td class="form-edit">
            <a href="articles/{{ $post->id }}/edit">
                <i class="far fa-edit"></i>
            </a>
        </td>
        <td class="form-delete">
            <a href="">
                <i class="far fa-trash-alt"></i>
            </a>
        </td>
    </tr>
@endforeach
</table>
@endsection