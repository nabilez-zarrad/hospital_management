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

$image = null;

if($request->hasFile('image'))
{
$image = $request->file('image')->store('doctors','public');
}

Medecin::create([

'nom' => $request->nom,
'email' => $request->email,
'telephone' => $request->telephone,
'section_id' => $request->section_id,
'adresse' => $request->adresse,
'experience' => $request->experience,
'description' => $request->description,
'image' => $image,
'status' => 1

]);

return back()->with('success','Doctor Added Successfully');

}
}
