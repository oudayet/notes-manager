@extends('layout')

@section('main')

<div class="text-right">
    <a href="{{ route('note.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Add
    </a>
</div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<br>
<table class="table table-bordered table-striped">
    <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Created Date</th>
        <th class="text-center" colspan="3">Action</th>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->title }}</td>
            <td>{{ $row->description }}</td>
            <td>{{ $row->priority }}</td>
            <td>{{ $row->created_at }}</td>
            <td class="text-center">
                <a href="{{ route('note.show', $row->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
            </td>
            <td class="text-center">
                <a href="{{ route('note.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            </td>
            <td class="text-center">
                <form action="{{ route('note.destroy', $row->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $data->links() !!}

@endsection