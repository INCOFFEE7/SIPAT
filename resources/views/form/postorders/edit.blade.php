@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Edit Post Order</h1>
        <form action="{{ route('post_orders.update', $post_order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer ID</label>
                <input type="text" name="customer_id" id="customer_id" class="form-control" value="{{ $post_order->customer_id }}">
            </div>
            <div class="form-group">
                <label for="no_blangko">No Blangko</label>
                <input type="text" name="no_blangko" id="no_blangko" class="form-control" value="{{ $post_order->no_blangko }}">
            </div>
            <div class="form-group">
                <label for="tanggal_pesan">Tanggal Pesan</label>
                <input type="date" name="tanggal_pesan" id="tanggal_pesan" class="form-control" value="{{ $post_order->tanggal_pesan }}">
            </div>
            <div class="form-group">
                <label for="jam_pesan">Jam Pesan</label>
                <input type="time" name="jam_pesan" id="jam_pesan" class="form-control" value="{{ $post_order->jam_pesan }}">
            </div>
            <div class="form-group">
                <label for="jumlah_tangki">Jumlah Tangki</label>
                <input type="number" name="jumlah_tangki" id="jumlah_tangki" class="form-control" value="{{ $post_order->jumlah_tangki }}">
            </div>
            <div class="form-group">
                <label for="kubikasi">Kubikasi</label>
                <input type="number" name="kubikasi" id="kubikasi" class="form-control" value="{{ $post_order->kubikasi }}">
            </div>
            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ $post_order->harga_jual }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ $post_order->keterangan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
