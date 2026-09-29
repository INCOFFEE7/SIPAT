@extends('layouts.spk')

@section('content')
<div class="result-wrap">
    <div class="result-html p-5">
        <h3 class="mb-4 font-weight-bold">Form Cetak SPK Pengantaran Air Tangki</h3>
        <div class="container mt-3">
            <div class="row">
                <label>Nomor SPK: <span class="font-weight-bold">{{ $orders->no_spk }}</span></label>
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <a href="{{ route('executions.index') }}" class="btn btn-success">Cetak SPK</a>
                                <a href="{{ route('executions.index') }}" class="btn btn-secondary">Cetak Laporan Harian</a>
                            </div>

                            <form action="{{ route('executions.update', $orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No Blangko</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr class="order-row" data-order="{{ json_encode($order) }}">
                                                        <td>
                                                            <input type="radio" name="no_blangko" value="{{ $orders->no_blangko }}">
                                                            {{ $orders->no_blangko }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center">Data belum tersedia.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="border p-3 rounded">
                                            <label>No. Sambungan : <span id="no_sambungan" class="font-weight-bold ml-2"></span></label><br>
                                            <label>Nama : <span id="nama" class="font-weight-bold" style="margin-left: 5em"></span></label><br>
                                            <label>Alamat : <span id="alamat" class="font-weight-bold" style="margin-left: 4.6em"></span></label><br>
                                            <label>Harga Air : <span id="harga_air" class="font-weight-bold" style="margin-left: 3.4em"></span></label><br>
                                            <label>Jumlah Kubikasi : <span id="kubikasi" class="font-weight-bold"style="margin-left: .6em"></span></label><br>
                                            <label>Keterangan : <span id="keterangan" class="font-weight-bold" style="margin-left: 2.7em"></span></label><br>
                                            
                                            <div class="form-inline">
                                                <label for="tanggal">Tanggal: </label>
                                                <input type="date" id="tanggal" class="form-control mx-2" required>
                                                <label for="jam">Jam: </label>
                                                <input type="time" id="jam" class="form-control mx-2" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <input  name="no_blangko_selected" id="no_blangko_selected" value="{{ $orders->no_blangko }}">
                                        <div class="form-group">
                                            <label for="petugas1">Petugas 1</label>
                                            <input type="text" class="form-control" id="petugas1" name="petugas1" value="{{ $orders->petugas1 }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="petugas2">Petugas 2</label>
                                            <input type="text" class="form-control" id="petugas2" name="petugas2" value="{{ $orders->petugas2 }}">
                                        </div>                                         
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Nomor SPK: <span class="font-weight-bold">{{ $orders->no_spk }}</span></label>
                                        <br>
                                        <div class="form-group">
                                            <label for="body_meter">No. Body Meter</label>
                                            <input type="number" class="form-control" id="body_meter" name="body_meter" value="{{ $orders->body_meter }}">
                                        </div>
                                        <!-- Input Stand -->
                                        <div class="form-group">
                                            <label for="stand_awal">Stand Awal</label>
                                            <input type="number" class="form-control" id="stand_awal" name="stand_awal" value="{{ $orders->stand_awal }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="stand_akhir">Stand Akhir</label>
                                            <input type="number" class="form-control" id="stand_akhir" name="stand_akhir" value="{{ $orders->stand_akhir }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('spk.destroy', $orders->id) }}" class="btn btn-danger mr-2">Hapus</a>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
