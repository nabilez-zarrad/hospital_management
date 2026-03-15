<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
  public function doctors()
{
    $sections = Section::all();
    $medecins = Medecin::with('section','image')->get();

    return view('doctors', compact('medecins','sections'));
}
}
