<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $items = [];
        return view('modules.index', compact('items'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'product_name' => 'required|string|max:255',
//            'category' => 'required|string|max:255',
//            'quantity' => 'required|integer',
//            'price' => 'required|numeric',
//        ]);
//
//        Inventory::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Inventory item created successfully.');
    }

    public function show($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Module::find($id);
        return view('modules.show', compact('item'));
    }

    public function edit($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Module::find($id);
        return view('modules.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'product_name' => 'required|string|max:255',
//            'category' => 'required|string|max:255',
//            'quantity' => 'required|integer',
//            'price' => 'required|numeric',
//        ]);
//
//        $item = Inventory::findOrFail($id);
        $item = Module::find($id);
        $item->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy($id)
    {
//        $item = Inventory::findOrFail($id);
//        $item->delete();
        $item = Module::find($id);
        $item->delete();
        return redirect()->route('modules.index')->with('success', 'Inventory item deleted successfully.');
    }
}
