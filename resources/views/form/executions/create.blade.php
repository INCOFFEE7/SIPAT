@extends('layouts.apps')

@section('content')
    <div class="container">
        <h1>Add New Execution</h1>
        <form action="{{ route('execution.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="worker_id">Worker ID</label>
                <input type="text" name="worker_id" id="worker_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_plat">No Plat</label>
                <input type="text" name="no_plat" id="no_plat" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_spk">No SPK</label>
                <input type="text" name="no_spk" id="no_spk" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_antar">Tanggal Antar</label>
                <input type="date" name="tanggal_antar" id="tanggal_antar" class="form-control">
            </div>
            <div class="form-group">
                <label for="jam_antar">Jam Antar</label>
                <input type="time" name="jam_antar" id="jam_antar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
