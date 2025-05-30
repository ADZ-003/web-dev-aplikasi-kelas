<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Major;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('major')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $majors = Major::all();
        return view('classes.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
        ]);

        SchoolClass::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(SchoolClass $class)
    {
        $majors = Major::all();
        return view('classes.edit', compact('class', 'majors'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
