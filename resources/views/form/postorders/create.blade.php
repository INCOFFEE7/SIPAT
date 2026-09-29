@extends('layouts.post')

@section('content')
    <section ection class="input_section">
    <h2>Form Pemesanan Air Tangki</h2>
    <form id="inputOrder" method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="input" required>
        <label for="jenis_pelanggan">Jenis Pelanggan : </label>
        <select name="jenis_pelanggan" id="jenis_pelanggan" required>
            <option value="Pelanggan">Pelanggan</option>
            <option value="Non Pelanggan">Non Pelanggan</option>
            <option value="Hankam">Hankam</option>
            <option value="Dinas PTMB">Dinas PTMB</option>
        </select>
        </div>
        <div class="input">
        <label for="no_sambungan">No. Sambungan : </label>
        <div class="lined">
            <input name="no_sambungan" id="no_sambungan" type="text">
            <label>Gol $$$</label>
        </div>
        </div>
        <div class="input">
            <label for="nama">Nama : </label>
            <input name="nama" id="nama" type="text" required>
        </div>
        <div class="input">
            <label for="alamat">Alamat : </label>
            <input name="alamat" id="alamat" type="text" required>
        </div>
        <div class="input">
            <label for="no_hp">No. Handphone : </label>
            <input name="no_hp" id="no_hp" type="text" required>
        </div>
        <div class="input">
            <label for="jumlah_tangki">Jumlah Tangki : </label>
            <div class="lined">
                <input name="jumlah_tangki" id="jumlah_tangki" type="number" oninput="showOutput()" required>
                <label id="cub"></label>
            </div>
        </div>
        <div class="input">
        <label for="harga_jual">Harga Air : </label>
        <input name="harga_jual" id="harga_jual" type="number" required>
        </div>
        <div class="input">
        <label for="keterangan">Keterangan : </label>
        <input name="keterangan" id="keterangan" type="text" required>
        </div>
        <div class="buttonGroup">
        <button class="orderSubmit" id="orderSubmit" type="submit" value="Simpan">Simpan</button>
        <button class="orderCancel" id="orderCancel" type="reset" value="Batal">Batal</button>
        <a href="\orders"><button class="orderExit" id="orderExit" type="button" value="Keluar">Keluar</button></a>
      </div>

    </form>
  </section>
@endsection
