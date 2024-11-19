<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $items = [];
        return view('answers.index', compact('items'));
    }

    public function create()
    {
        return view('answers.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('answers.index')->with('success', 'Answer created successfully.');
    }

    public function show($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Answer::find($id);
        return view('answers.show', compact('item'));
    }

    public function edit($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Answer::find($id);
        return view('answers.edit', compact('item'));
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
        $item = Answer::find($id);
        $item->update($request->all());
        return redirect()->route('answers.index')->with('success', 'Answer updated successfully.');
    }

    public function destroy($id)
    {
//        $item = Inventory::findOrFail($id);
//        $item->delete();
        $item = Answer::find($id);
        $item->delete();
        return redirect()->route('answers.index')->with('success', 'Answer deleted successfully.');
    }
}
