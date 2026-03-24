<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class AdminPatientsController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::query()
            ->with('user')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.patients.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        $patient->load([
            'user',
            'appointments' => fn ($q) => $q->with('doctor')->latest()->limit(50),
        ]);

        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('admin.patients.index')
            ->with('success', 'Patient removed.');
    }
}
