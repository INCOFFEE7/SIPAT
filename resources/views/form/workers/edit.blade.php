@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Edit Worker</h1>
        <form action="{{ route('workers.update', $worker->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="petugas1">Petugas 1</label>
                <input type="text" name="petugas1" id="petugas1" class="form-control" value="{{ $worker->petugas1 }}">
            </div>
            <div class="form-group">
                <label for="petugas2">Petugas 2</label>
                <input type="text" name="petugas2" id="petugas2" class="form-control" value="{{ $worker->petugas2 }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
