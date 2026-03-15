<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\Section;

class AdminController extends Controller
{
    public function createDoctor()
{
    $sections = Section::all();

    return view('add_doctor', compact('sections'));
}

public function storeDoctor(Request $request)
{
    Medecin::create([
        'name' => $request->name,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'section_id' => $request->section_id
    ]);

    return back()->with('success','Doctor Added Successfully');
}
}
