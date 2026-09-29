@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis Pelanggan</th>
                    <th>No Sambungan</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->jenis_pelanggan }}</td>
                        <td>{{ $customer->no_sambungan }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->no_hp }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
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
