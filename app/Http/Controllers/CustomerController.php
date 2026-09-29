<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\PostOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('form.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('form.customers.show', compact('customer'));
    }

    public function create()
    {
        return view('form.customers.create');
    }

    public function store(Request $request)
    {
        $wkt_psn = Carbon::now()->toTimeString();
        $tgl_psn = Carbon::now()->addHour(8)->toDateString();
        $bln_psn = Carbon::now()->addHour(8)->month;
        $thn_psn = Carbon::now()->addHour(8)->year;

        $blangko = str()->slug(sprintf('%04d', count(PostOrder::all())+1).'-'."TA"."-".sprintf('%02d', $bln_psn)."-".$thn_psn);
        $blangko = strtoupper($blangko);
        $blangko = str_replace('-', '/', $blangko);
        $blangko = str_pad($blangko, 4, '0', STR_PAD_LEFT);
        $cub = $request->jumlah_tangki*5;
        $price = $request-> jumlah_tangki * $request-> harga_jual;

        $customers = Customer::create([
            'jenis_pelanggan' => $request-> jenis_pelanggan,
            'no_sambungan' => $request-> no_sambungan,
            'nama' => $request-> nama,
            'alamat' => $request-> alamat,
            'no_hp' => $request-> no_hp,
        ]);

        $posts = PostOrder::create([
            'customer_id'=> $customers->id,
            'no_blangko' => $blangko,
            'jumlah_tangki' => $request-> jumlah_tangki,
            'kubikasi' => $cub,
            'tanggal_pesan' => $tgl_psn,
            'jam_pesan' => $wkt_psn,
            'harga_jual' => $request-> harga_jual,
            'keterangan' => $request-> keterangan,
            'status' => 0,
        ]);
        return view('form.orders.index')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('form.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('form.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->route('form.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
