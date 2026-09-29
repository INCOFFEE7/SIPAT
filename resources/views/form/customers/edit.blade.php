@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jenis_pelanggan">Jenis Pelanggan</label>
                <input type="text" name="jenis_pelanggan" id="jenis_pelanggan" class="form-control" value="{{ $customer->jenis_pelanggan }}">
            </div>
            <div class="form-group">
                <label for="no_sambungan">No Sambungan</label>
                <input type="text" name="no_sambungan" id="no_sambungan" class="form-control" value="{{ $customer->no_sambungan }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $customer->nama }}">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $customer->no_hp }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
