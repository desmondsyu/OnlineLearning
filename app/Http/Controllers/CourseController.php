<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $items = [];
        return view('courses.index', compact('items'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Course::find($id);
        return view('courses.show', compact('item'));
    }

    public function edit($id)
    {
//        $item = Inventory::findOrFail($id);
        $item = Course::find($id);
        return view('courses.edit', compact('item'));
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
        $item = Course::find($id);
        $item->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
//        $item = Inventory::findOrFail($id);
//        $item->delete();
        $item = Course::find($id);
        $item->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
