<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return response()->json(['data' => $majors, 'message' => 'Majors fetched successfully']);
    }

    public function getMajorsByFaculty($facultyId)
    {
        $majors = Major::where('faculty_id', $facultyId)->get();
        return response()->json(['data' => $majors, 'message' => 'Majors fetched successfully']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $major = Major::create($request->all());
        return response()->json(['data' => $major, 'message' => 'Major created successfully'], 201);
    }

    public function show($id)
    {
        $major = Major::find($id);
        return response()->json(['data' => $major, 'message' => 'Major fetched successfully']);
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $major->update($request->all());
        return response()->json(['data' => $major, 'message' => 'Major updated successfully']);
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return response()->json(['message' => 'Major deleted successfully']);
    }
}
