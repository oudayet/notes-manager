@extends('layout')

@section('main')
<div class="text-right col-md-4">
    <a href="{{ route('note.index') }}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
<br>
@if($errors->any())
<div class="alert alert-danger col-md-4">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<form action="{{ route('note.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="text-right">Title</label>
        <div class="col-md-4">
            <input type="text" name="note_title" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="text-right">Description</label>
        <div class="col-md-4">
            <input type="text" name="note_description" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="text-right">Priority</label>
        <div class="col-md-4">
            <select class="form-control input-lg" name="note_priority">
                @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-md-4">
            <input type="submit" name="add" class="btn btn-primary btn-block input-lg" value="Add" />
        </div>
    </div>
</form>

@endsection