<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;


Route::apiResource('faculties', FacultyController::class);
Route::apiResource('majors', MajorController::class);

Route::get('majors/faculty/{facultyId}', [MajorController::class, 'getMajorsByFaculty']);
