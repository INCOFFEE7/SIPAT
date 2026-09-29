@extends('layouts.apps')

@section('content')
<div class="result-wrap">
    <div class="result-html">
        <div class="button-group">
        <a href="{{ route('orders.create') }}" class="btn btn-md btn-success mb-3">Input Pemesanan</a>
        <a href="{{ route('executions.index') }}" class="btn btn-md btn-success mb-3">Input Pelaksanaan</a>
        <a href="\executions" class="btn btn-md btn-secondary mb-3">Cetak Ulang</a>
        <a href="{{ url()->current() }}" class="btn btn-md btn-info mb-3">Refresh</a>
        </div>

        <input id="tab-1" type="radio" name="tab" class="unFinished visually-hidden" checked><label for="tab-1" class="tab" >Daftar pemesanan yang belum dilaksanakan</label>
        <input id="tab-2" type="radio" name="tab" class="Finished visually-hidden"><label for="tab-2" class="tab" >Daftar Pemesanan yang telah dilaksanakan</label>


        <div class="result-form">
            <div class="unFinished-htm">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">

                                    <label class="bold">Filter Berdasarkan</label>
                                    <br>
                                    <input type="radio" id="tanggalTertentu" name="filter" value="tanggalTertentu">
                                    <label for="tanggalTertentu">Per Tanggal</label>
                                    <div id="tanggalTertentuInput" class="inline" style="float: inline-end; display: none;">
                                        <div id="tanggalTertentuInput" style="display: flex; align-items: center;">
                                            <form action="{{ route('orders.index') }}" method="GET">
                                                <input type="date" id="tanggalMulai" name="tanggalMulai" style="margin-right:0.5em">
                                                <label name="tanggalSelesai" for="tanggalSelesai" style="margin-right:0.5em">SD</label>
                                                <input type="date" id="tanggalSelesai" name="tanggalSelesai" style="margin-right:0.5em">
                                                <button style="margin-left:.3em; margin-bottom:.2em" class="btn btn-sm btn-outline-info" type="submit">Cari</button>
                                            </form>
                                        </div>
                                    </div

                                    <br>
                                    <div class="search-container">
                                        <label for="search">No. Blangko Pemesanan</label>
                                        <form action="{{ route('orders.index') }}" method="GET" class="form-inline mb-3">
                                        <input type="text" style="margin-right:0.5em" placeholder="Masukkan No. Blangko..." value="{{ request('search') }}" id="search" name="search">
                                        <button class="btn btn-md btn-outline-info" type="submit">Cari</button>
                                    </form>

                                        @isset($totalOrders)
                                        <div class="data-count">
                                        Jumlah Data: {{$totalOrders}}
                                        </div>
                                        @endisset
                                    </div>
                                    <div style="overflow-x:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">No. Blangko</th>
                                            <th scope="col">No. Pelanggan</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Harga Jual</th>
                                            <th scope="col">Tanggal Pesan</th>
                                            <th scope="col">Jam</th>
                                            <th scope="col">Jumlah Kubikasi (M³)</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">No. HP</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse ($orders as $order)
                                            @if ($order->status == 0)
                                                <tr>
                                                    <td>{{ $order->postOrder->no_blangko }}</td>
                                                    <td>{{ $order->postOrder->customer->no_sambungan }}</td>
                                                    <td>{{ $order->postOrder->customer->nama }}</td>
                                                    <td>{{ $order->postOrder->customer->alamat }}</td>
                                                    <td>{{ $order->postOrder->harga_jual }}</td>
                                                    <td>{{ $order->postOrder->tanggal_pesan }}</td>
                                                    <td>{{ $order->postOrder->jam_pesan }}</td>
                                                    <td style="text-align:center">{{ $order->postOrder->kubikasi }}</td>
                                                    <td>{{ $order->postOrder->keterangan }}</td>
                                                    <td>{{ $order->postOrder->customer->no_hp }}</td>
                                                    <td class="text-center">
                                                        <td>
                                                            <form action="{{ route('orders.destroy', $order->postOrder->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </td>
                                                    @endif
                                                    @empty
                                                    <div class="alert alert-danger">
                                                        Data order belum Tersedia.
                                                    </div>
                                                </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Finished-htm">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <label class="bold">Filter Berdasarkan</label>
                                    <br>
                                    <input type="radio" id="tanggalTertentu" name="filter" value="tanggalTertentu">
                                    <label for="tanggalTertentu">Per Tanggal</label>
                                    <div id="tanggalTertentuInput" class="inline" style="float: inline-end; display: none;">
                                        <div id="tanggalTertentuInput" style="display: flex; align-items: center;">
                                            <form action="{{ route('post_orders.index') }}" method="GET">
                                            <input type="date" id="tanggalMulai2" name="tanggalMulai2" style="margin-right:0.5em">
                                            <label for="tanggalSelesai2" style="margin-right:0.5em">sd</label>
                                            <input type="date" id="tanggalSelesai2" name="tanggalSelesai2" style="margin-right:0.5em">
                                            <button style="margin-left:.3em; margin-bottom:.2em" class="btn btn-sm btn-outline-info" type="submit">Cari</button>
                                        </form>
                                    </div>
                                </div

                                <br>
                                <div class="search-container">
                                    <label for="search">No. Blangko Pemesanan</label>
                                    <form action="{{ route('post_orders.index') }}" method="GET" class="form-inline mb-3">
                                        <input type="text" style="margin-right:0.5em" placeholder="Masukkan No. Blangko..." value="{{ request('search') }}" id="search" name="search">
                                        <button class="btn btn-md btn-outline-info" type="submit">Cari</button>
                                    </form>
                                            @isset($totalOrders)
                                            <div class="data-count">
                                            Jumlah Data: {{$totalOrders}}
                                            </div>
                                            @endisset
                                        </div>
                                        <div style="overflow-x:auto;">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Jenis Pelanggan</th>
                                                    <th scope="col">No. Pelanggan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Harga Jual</th>
                                                    <th scope="col">Tanggal Pesan</th>
                                                    <th scope="col">Jam</th>
                                                    <th scope="col">Tanggal Selesai</th>
                                                    <th scope="col">Jam</th>
                                                    <th scope="col">Petugas 1</th>
                                                    <th scope="col">Petugas 2</th>
                                                    <th scope="col">Jumlah Kubikasi (M3)</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">No. HP</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @forelse ($orders as $order)
                                                    @if ($order->status == 1)
                                                        <tr>
                                                            <td>{{ $order->jenis_pelanggan }}</td>
                                                            <td>{{ $order->no_sambungan }}</td>
                                                            <td>{{ $order->nama }}</td>
                                                            <td>{{ $order->alamat }}</td>
                                                            <td>{{ $order->harga_jual }}</td>
                                                            <td>{{ $order->tanggal_pesan }}</td>
                                                            <td>{{ $order->jam_pesan }}</td>
                                                            <td>{{ $order->tanggal_selesai }}</td>
                                                            <td>{{ $order->jam_selesai }}</td>
                                                            <td>{{ $order->petugas_1 }}</td>
                                                            <td>{{ $order->petugas_2 }}</td>
                                                            <td style="text-align:center">{{ $order->kubikasi }}</td>
                                                            <td>{{ $order->keterangan }}</td>
                                                            <td>{{ $order->no_hp }}</td>
                                                            <td class="text-center">
                                                                <td>
                                                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                                                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </td>
                                                            @endif
                                                            @empty
                                                            <div class="alert alert-danger">
                                                                Data order belum Tersedia.
                                                            </div>
                                                        </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
