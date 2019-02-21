@extends('layouts/app')
@section('title')
Contact list
@endsection
@section('content')
@foreach ($contacts as $contact)
<div class="contact-view">
    {{ $contact->contact_name }} <span class="contact-date">le {{ $contact->contact_date }}<br />
    {{ "<" . $contact->contact_email . ">" }}<br /><br />
    {{ $contact->contact_message }}
</div>
@endforeach
@endsection