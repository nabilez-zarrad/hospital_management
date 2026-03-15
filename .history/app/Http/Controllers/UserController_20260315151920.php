<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Medecin;

class UserController extends Controller
{

    public function Dashboard()
    {
        $sections = Section::all();
        $medecins = Medecin::with('section','image')->take(6)->get();

        if(Auth::check() && Auth::user()->user_type == 'user'){
            return view("index", compact('sections','medecins'));
        }
        elseif(Auth::check() && Auth::user()->user_type == 'admin'){
            return view("admin.dashboard");
        }
        else{
            return redirect('/');
        }
    }

    public function Index()
    {
        $sections = Section::all();
        $medecins = Medecin::with('section','image')->take(6)->get();

        return view('index', compact('sections','medecins'));
    }

  public function doctors()
{
    $sections = Section::all();
    $medecins = Medecin::with('section','image')->get();

    return view('doctors', compact('medecins','sections'));
}
public function doctorProfile($id)
{
    $medecin = Medecin::with('section','image')->findOrFail($id);

    return view('doctor_profile', compact('medecin'));
}

}