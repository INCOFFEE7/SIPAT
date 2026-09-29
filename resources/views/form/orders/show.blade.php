@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Order Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Post ID</th>
                <td>{{ $order->post_id }}</td>
            </tr>
            <tr>
                <th>Execution ID</th>
                <td>{{ $order->execution_id }}</td>
            </tr>
            <tr>
                <th>Tanggal Selesai</th>
                <td>{{ $order->tanggal_selesai }}</td>
            </tr>
            <tr>
                <th>Jam Selesai</th>
                <td>{{ $order->jam_selesai }}</td>
            </tr>
        </table>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
