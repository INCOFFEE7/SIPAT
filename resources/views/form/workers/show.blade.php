@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Worker Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $worker->id }}</td>
            </tr>
            <tr>
                <th>Petugas 1</th>
                <td>{{ $worker->petugas1 }}</td>
            </tr>
            <tr>
                <th>Petugas 2</th>
                <td>{{ $worker->petugas2 }}</td>
            </tr>
        </table>
        <a href="{{ route('workers.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
