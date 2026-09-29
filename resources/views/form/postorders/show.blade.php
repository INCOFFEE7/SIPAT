@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Post Order Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $post_order->id }}</td>
            </tr>
            <tr>
                <th>Customer ID</th>
                <td>{{ $post_order->customer_id }}</td>
            </tr>
            <tr>
                <th>No Blangko</th>
                <td>{{ $post_order->no_blangko }}</td>
            </tr>
            <tr>
                <th>Tanggal Pesan</th>
                <td>{{ $post_order->tanggal_pesan }}</td>
            </tr>
            <tr>
                <th>Jam Pesan</th>
                <td>{{ $post_order->jam_pesan }}</td>
            </tr>
            <tr>
                <th>Jumlah Tangki</th>
                <td>{{ $post_order->jumlah_tangki }}</td>
            </tr>
            <tr>
                <th>Kubikasi</th>
                <td>{{ $post_order->kubikasi }}</td>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <td>{{ $post_order->harga_jual }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $post_order->keterangan }}</td>
            </tr>
        </table>
        <a href="{{ route('post_orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
