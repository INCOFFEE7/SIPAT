@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Post Orders</h1>
        <a href="{{ route('post_orders.create') }}" class="btn btn-primary">Add New Post Order</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>No Blangko</th>
                    <th>Tanggal Pesan</th>
                    <th>Jam Pesan</th>
                    <th>Jumlah Tangki</th>
                    <th>Kubikasi</th>
                    <th>Harga Jual</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post_orders as $post_order)
                    <tr>
                        <td>{{ $post_order->id }}</td>
                        <td>{{ $post_order->customer_id }}</td>
                        <td>{{ $post_order->no_blangko }}</td>
                        <td>{{ $post_order->tanggal_pesan }}</td>
                        <td>{{ $post_order->jam_pesan }}</td>
                        <td>{{ $post_order->jumlah_tangki }}</td>
                        <td>{{ $post_order->kubikasi }}</td>
                        <td>{{ $post_order->harga_jual }}</td>
                        <td>{{ $post_order->keterangan }}</td>
                        <td>
                            <a href="{{ route('post_orders.show', $post_order->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('post_orders.edit', $post_order->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('post_orders.destroy', $post_order->id) }}" method="POST" style="display:inline-block;">
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
