@extends('layout')

@section('main')
<div class="text-right col-md-4">
    <a href="{{ route('note.index') }}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
<br>
<h3>Title: {{ $data->title }}</h3>
<h4>Description: {{ $data->description }}</h4>
<h4>Priority: {{ $data->priority }}</h4>
@endsection