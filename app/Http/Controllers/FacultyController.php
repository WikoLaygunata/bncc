<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return response()->json(['data' => $faculties, 'message' => 'Faculties fetched successfully']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faculty = Faculty::create($request->all());
        return response()->json(['data' => $faculty, 'message' => 'Faculty created successfully'], 201);
    }

    public function show(Faculty $faculty)
    {
        return response()->json(['data' => $faculty, 'message' => 'Faculty fetched successfully']);
    }

    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faculty->update($request->all());
        return response()->json(['data' => $faculty, 'message' => 'Faculty updated successfully']);
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return response()->json(['message' => 'Faculty deleted successfully']);
    }
}
