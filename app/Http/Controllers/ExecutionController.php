<?php

namespace App\Http\Controllers;

use App\Models\Execution;
use Illuminate\Http\Request;
use App\Models\Actions;
use App\Models\Worker;
use App\Models\Order;
use Carbon\Carbon;

class ExecutionController extends Controller
{
    public function index()
    {
        $orders = Order::with(['postOrder.customer', 'execution']);
        $executions = Execution::all();
        return view('form.executions.index', compact('executions','orders'));
    }

    public function show($id)
    {
        
        $execution = Execution::find($id);
        return view('form.executions.show', compact('execution'));
    }

    public function create()
    {
        return view('form.executions.create');
    }

    public function store(Request $request)
    {
        $tgl_psn = Carbon::now()->addHour(8)->toDateString();
        $bln_psn = Carbon::now()->addHour(8)->month;
        $thn_psn = Carbon::now()->addHour(8)->year;
            //create post
            
            $counts = Execution::selectRaw('no_spk, COUNT(*) as count')
            ->groupBy('no_spk')
            ->get();
            $spk = str()->slug(sprintf('%03d', count(Execution::selectRaw('no_spk, COUNT(*) as count')->groupBy('no_spk')->get())+1)."-"."LY@PGL@CS"."-".sprintf('%02d', $bln_psn)."-".$thn_psn);
            $spk = strtoupper($spk);
            $spk = str_replace('-', '/', $spk);
            $spk = str_replace('/AT/', '.', $spk);
            $spk = str_pad($spk, 4, '0', STR_PAD_LEFT);
            $tglawal = $request-> tanggalMulai;
            $tglakhir = $request -> tanggalSelesai;

            $query = Order::with(['postOrder.customer', 'execution']);
    
            if ($request->has('no_blangko')) {
                foreach ($request->input('no_blangko') as $no_blangko) {
                    $order = Order::whereHas('postOrder', function($query) use ($no_blangko) {
                        $query->where('no_blangko', $no_blangko);
                    })->first();
    
                    if ($order) {
                        $execution = Execution::create([
                            'no_spk' => $request->input('no_spk'),
                            'tanggal_antar' => $request->input('tanggal_antar'),
                            'jam_antar' => $request->input('jam_antar'),
                            'worker_id' => $request->input('worker_id'),
                            'no_plat' => $request->input('no_plat'),
                        ]);
    
                        $order->update([
                            'execution_id' => $execution->id,
                        ]);
                    }
                }
            }
    
            $orders = $query->get();
            return redirect()->route('execution.index')->with('success', 'Data updated successfully');
        }

    public function edit($id)
    {
        $orders = Order::with(['postOrder.customer', 'execution'])->findOrFail($id);
        return view('form.executions.edit', compact('orders'));
    }

    public function update(Request $request, $id)
{
    // Validasi request
    $validatedData = $request->validate([
        'petugas1' => 'required',
        'body_meter' => 'required|numeric',
        'stand_awal' => 'required|numeric',
        'stand_akhir' => 'required|numeric',
        'tanggal' => 'required',
        'jam' => 'required',
        'no_blangko_selected' => 'required',
    ]);

    $no_blangko_selected = $request->no_blangko_selected;
    $action = Actions::whereHas('orders', function ($query) use ($no_blangko_selected) {
        $query->where('no_blangko', $no_blangko_selected);
    })->first();

    if (!$action) {
        return redirect()->back()->with('error', 'Action not found.'); // Handle if Action not found
    }

    // Update Action attributes based on request data
    $action->update([
        'petugas1' => $request->petugas1,
        'petugas2' => $request->petugas2,
        'body_meter' => $request->body_meter,
        'stand_awal' => $request->stand_awal,
        'stand_akhir' => $request->stand_akhir,
    ]);

    $order = Order::where('no_blangko', $no_blangko_selected)->first();

    if ($order) {
        // Perbarui atribut status pada data order
        $order->tanggal_selesai = $request->tanggal;
        $order->jam_selesai = $request->jam;
        $order->status = '1'; // Ganti 'Baru' dengan nilai status yang diinginkan
        $order->save();
    }

    // Redirect atau tindakan lainnya setelah penyimpanan berhasil
    return redirect()->back()->with('success', 'Data berhasil disimpan.');
}


    public function destroy($id)
    {
        Execution::findOrFail($id)->delete();
        return redirect()->route('form.executions.index')->with('success', 'Execution deleted successfully.');
    }
}
