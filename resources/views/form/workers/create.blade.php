@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Add New Worker</h1>
        <form action="{{ route('workers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="petugas1">Petugas 1</label>
                <input type="text" name="petugas1" id="petugas1" class="form-control">
            </div>
            <div class="form-group">
                <label for="petugas2">Petugas 2</label>
                <input type="text" name="petugas2" id="petugas2" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
