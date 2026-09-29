<?php

namespace App\Http\Controllers;

use App\Models\PostOrder;
use Illuminate\Http\Request;

class PostOrderController extends Controller
{
    public function index()
    {
        $postOrders = PostOrder::all();
        return view('form.postorders.index', compact('postOrders'));
    }

    public function show($id)
    {
        $postOrders = PostOrder::find($id);
        return view('form.postorders.show', compact('postOrders'));
    }

    public function create()
    {
        return view('form.postorders.create');
    }

    public function store(Request $request)
    {
        $postOrders = PostOrder::create($request->all());
        return redirect()->route('form.postorders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $postOrders = PostOrder::findOrFail($id);
        return view('form.postorders.edit', compact('postOrders'));
    }

    public function update(Request $request, $id)
    {
        $postOrders = PostOrder::findOrFail($id);
        $postOrders->update($request->all());
        return redirect()->route('form.postorders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        PostOrder::findOrFail($id)->delete();
        return redirect()->route('form.postorders.index')->with('success', 'Order deleted successfully.');
    }
}
