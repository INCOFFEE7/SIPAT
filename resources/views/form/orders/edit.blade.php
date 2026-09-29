@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Edit Order</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post_id">Post ID</label>
                <input type="text" name="post_id" id="post_id" class="form-control" value="{{ $order->post_id }}">
            </div>
            <div class="form-group">
                <label for="execution_id">Execution ID</label>
                <input type="text" name="execution_id" id="execution_id" class="form-control" value="{{ $order->execution_id }}">
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ $order->tanggal_selesai }}">
            </div>
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ $order->jam_selesai }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
