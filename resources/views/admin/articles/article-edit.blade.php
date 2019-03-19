@extends('layouts/app')
@section('title')
Admin - Article edit
@endsection
@section('content')
<form method="POST" action="/admin/articles/{{ $post->id }}" class="contact-form">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <label>Titre</label>
    <div class="form-group">
        <input type="text" name="post_name" value="{{ $post->post_name }}" class="form-control " />
    </div>
    <label>Author</label>
    <div class="form-group">
        <select name="post_author" class="form-control ">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}"
                @if ($post->author->id == $author->id)
                    selected
                @endif
            >{{ $author->name }}</option>
        @endforeach
        </select>
    </div>
    {{-- <div class="form-group">
        <input type="date" name="post_date" value="{{ $post->post_date }}" class="form-control " />
    </div> --}}
    <label>Content</label>
    <div class="form-group">
        <textarea name="post_content" rows="5" class="form-control ">{{ $post->post_content }}</textarea>
    </div>
    <label>Status</label>
    <div class="form-group">
        <input type="text" name="post_status" value="{{ $post->post_status }}" class="form-control " />
    </div>
    <div class="form-group">
        <input type="submit" value="Enregistrer" class="btn btn-secondary" />
    </div>
</form>
@endsection