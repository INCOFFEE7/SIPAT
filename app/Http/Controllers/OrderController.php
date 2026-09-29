<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\PostOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['postOrder.customer', 'execution']);

        // Handle search by date range
        if ($request->filled(['start_date', 'end_date'])) {
            $query->whereHas('postOrder', function($query) use ($request) {
                $query->whereBetween('tanggal_pesan', [$request->tanggalMulai, $request->tanggalSelesai]);
            });
        }

        $orders = $query->get();
        $totalOrders = count($orders);

        return view('form.orders.index', compact('orders','totalOrders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('form.orders.show', compact('order'));
    }

    public function create()
    {
        return view('form.orders.create');
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

        $orders = Order::create([
            'post_id'=> $posts->id,
        ]);


        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('form.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('form.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('form.orders.index')->with('success', 'Order deleted successfully.');
    }
}
