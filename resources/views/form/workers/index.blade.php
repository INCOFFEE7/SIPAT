@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Workers</h1>
        <a href="{{ route('workers.create') }}" class="btn btn-primary">Add New Worker</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Petugas 1</th>
                    <th>Petugas 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->id }}</td>
                        <td>{{ $worker->petugas1 }}</td>
                        <td>{{ $worker->petugas2 }}</td>
                        <td>
                            <a href="{{ route('workers.show', $worker->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('workers.destroy', $worker->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
