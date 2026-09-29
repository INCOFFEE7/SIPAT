@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Execution Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $execution->id }}</td>
            </tr>
            <tr>
                <th>Worker ID</th>
                <td>{{ $execution->worker_id }}</td>
            </tr>
            <tr>
                <th>No Plat</th>
                <td>{{ $execution->no_plat }}</td>
            </tr>
            <tr>
                <th>No SPK</th>
                <td>{{ $execution->no_spk }}</td>
            </tr>
            <tr>
                <th>Tanggal Antar</th>
                <td>{{ $execution->tanggal_antar }}</td>
            </tr>
            <tr>
                <th>Jam Antar</th>
                <td>{{ $execution->jam_antar }}</td>
            </tr>
        </table>
        <a href="{{ route('execution.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
