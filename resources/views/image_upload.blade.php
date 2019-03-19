@extends('layouts/app')
@section('title')
Images upload
@endsection
@section('content')
<form action="{{ url('/images/store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" class="form-control {{ $errors->has('img1') ? 'is-invalid' : '' }}" name="img1" id="img1" placeholder="Votre image"
            value="{{ old('img1') }}"> {!! $errors->first('img1', '
        <div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="btn-submit">
        <button type="submit" class="btn btn-secondary">Upload !</button>
    </div>
</form>
@endsection