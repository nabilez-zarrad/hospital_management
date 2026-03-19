<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔥 Sections
        $cardio = Section::create(['name' => 'Cardiology']);
        $dentist = Section::create(['name' => 'Dentist']);
        $derma = Section::create(['name' => 'Dermatology']);

        // 👤 Users Doctors
        $users = [];

        for ($i = 1; $i <= 5; $i++) {
            $users[] = User::create([
                'name' => 'Doctor ' . $i,
                'email' => 'doctor'.$i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'doctor'
            ]);
        }

        // 🩺 Doctors
        foreach ($users as $index => $user) {

            Doctor::create([
                'user_id' => $user->id,
                'first_name' => 'Doc'.$index,
                'last_name' => 'Test',
                'phone' => '060000000'.$index,
                'speciality' => 'General',
                'price' => rand(100,300),
                'is_free' => rand(0,1),
                'rating' => rand(3,5),
                'total_reviews' => rand(1,20),
                'section_id' => rand(1,3)
            ]);
        }

        // 👤 Patients
        for ($i = 1; $i <= 5; $i++) {

            $user = User::create([
                'name' => 'Patient '.$i,
                'email' => 'patient'.$i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'patient'
            ]);

            Patient::create([
                'user_id' => $user->id,
                'first_name' => 'Patient'.$i,
                'last_name' => 'Test',
                'phone' => '070000000'.$i,
                'city' => 'Fes',
                'country' => 'Morocco'
            ]);
        }
    }
}