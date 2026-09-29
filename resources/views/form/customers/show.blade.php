@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $customer->id }}</td>
            </tr>
            <tr>
                <th>Jenis Pelanggan</th>
                <td>{{ $customer->jenis_pelanggan }}</td>
            </tr>
            <tr>
                <th>No Sambungan</th>
                <td>{{ $customer->no_sambungan }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $customer->nama }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $customer->no_hp }}</td>
            </tr>
        </table>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
