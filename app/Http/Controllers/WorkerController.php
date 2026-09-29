<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return view('form.workers.index', compact('workers'));
    }

    public function show($id)
    {
        $worker = Worker::find($id);
        return view('form.workers.show', compact('worker'));
    }

    public function create()
    {
        return view('form.workers.create');
    }

    public function store(Request $request)
    {
        $worker = Worker::create($request->all());
        return redirect()->route('form.workers.index')->with('success', 'Worker created successfully.');
    }

    public function edit($id)
    {
        $worker = Worker::findOrFail($id);
        return view('form.workers.edit', compact('worker'));
    }

    public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->update($request->all());
        return redirect()->route('form.workers.index')->with('success', 'Worker updated successfully.');
    }

    public function destroy($id)
    {
        Worker::findOrFail($id)->delete();
        return redirect()->route('form.workers.index')->with('success', 'Worker deleted successfully.');
    }
}
