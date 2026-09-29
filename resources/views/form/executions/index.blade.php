@extends('layouts.execution')

@section('content')
<div class="result-wrap">
    <div class="result-html" style="padding: 20px 70px;">
        <h3 style="margin-top: 3px; font-size:1.5em; font-weight:bold">Form Cetak SPK Pengantaran Air Tangki</h3>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('executions.store') }}" method="POST">
                                @csrf
                                <div class="d-flex align-items-center mb-4">
                                    <label class="font-weight-bold h5 mb-0">
                                        Jumlah Pemesanan: {{ $orders->count() }},
                                        Jumlah Pengantaran yang dipilih: {{ $executions->whereNull('no_spk')->count() }}

                                    </label>
                                    <button type="submit" class="btn btn-success ml-3">Simpan</button>
                                    <a href="{{ route('workers.create') }}" class="btn btn-secondary ml-2">Cetak</a>
                                </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_antar">Tanggal Antar:</label>
                                            <input type="date" class="form-control" id="tanggal_antar" name="tanggal_antar" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jam_antar">Jam Antar:</label>
                                            <input type="time" class="form-control" id="jam_antar" name="jam_antar" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="no_plat">No. Plat:</label>
                                            <input type="text" class="form-control" id="no_plat" name="no_plat" required>
                                        </div>
                                    </div>  
                                </div>
                                <h3>Pilih Pemesanan:</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkall" onclick="toggle(this)">
                                                        <label class="form-check-label" for="checkall">Pilih Semua</label>
                                                    </div>
                                                </th>
                                                <th scope="col">Petugas 1</th>
                                                <th scope="col">Petugas 2</th>
                                                <th scope="col">Tanggal Antar</th>
                                                <th scope="col">Jam</th>                                            
                                                <th scope="col">No. Plat</th>
                                                <th scope="col">No. Blangko</th>
                                                <th scope="col">Tanggal Pesan</th>
                                                <th scope="col">Jam</th>
                                                <th scope="col">No. Sambungan</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                @if ($order->execution->no_spk == null)
                                                    <tr>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" name="no_blangko[]" value="{{ $order->no_blangko }}" id="blangko{{ $order->id }}">
                                                        </td>
                                                        <td>{{ optional($order->execution)->petugas1 }}</td>
                                                        <td>{{ optional($order->execution)->petugas2 }}</td>
                                                        <td>{{ optional($order->execution)->tanggal_antar }}</td>
                                                        <td>{{ optional($order->execution)->jam_antar }}</td>
                                                        <td>{{ optional($order->execution)->no_plat }}</td>
                                                        <td>{{ $order->postOrder->no_blangko }}</td>
                                                        <td>{{ $order->postOrder->tanggal_pesan }}</td>
                                                        <td>{{ $order->postOrder->jam_pesan }}</td>
                                                        <td>{{ $order->postOrder->customer->no_sambungan }}</td>
                                                        <td>{{ $order->postOrder->customer->nama }}</td>
                                                        <td>{{ $order->postOrder->customer->alamat }}</td>
                                                        <td>{{ $order->postOrder->customer->keterangan }}</td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="13" class="text-center">Data belum tersedia.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <br><br>
                            <label class="font-weight-bold">Filter Berdasarkan</label>
                            <br>
                            <div id="tanggalTertentuInput" class="d-flex align-items-center mt-2">
                                <label style="margin-right: 2.5em" for="tanggalTertentu">Per Tanggal</label>
                                <form action="{{ route('executions.create') }}" method="GET" class="d-flex align-items-center">
                                    <input type="date" id="tanggalSelesai" name="tanggalSelesai" class="form-control mr-2">
                                    <button class="btn btn-outline-info btn-sm" type="submit">Cari</button>
                                </form>
                            </div>
                            <label class="font-weight-bold mt-4">Daftar SPK</label>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. SPK</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($executions->groupBy('no_spk') as $no_spk => $group)
                                            <tr>
                                                <td>{{ $no_spk }}</td>                                                    
                                                <td class="text-center">
                                                    <a href="{{ route('executions.show', $group->first()->id) }}" class="btn btn-primary btn-sm">PRINT</a>
                                                    <a href="{{ route('executions.edit', $group->first()->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center">Data belum tersedia.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-end">
                            <a href="{{ url()->current() }}" class="btn btn-info mb-3">Refresh</a>
                            <a href="{{ route('orders.index') }}" class="btn btn-danger mb-3 ml-3">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

