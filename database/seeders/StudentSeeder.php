<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // NIM utama kamu sesuai soal
        Student::create([
            'nim' => '2457401019',
            'name' => 'Hilman Nawawi', // Ganti dengan nama lengkapmu
            'study_program' => 'Manajemen Informatika',
            'birth_date' => '2004-05-15',
            'gpa' => 3.85,
            'is_active' => true,
        ]);

        // Tambahan 18 data dummy otomatis (total 19 data sesuai ketentuan 10 + 9)
        for ($i = 2; $i <= 19; $i++) {
            Student::create([
                'nim' => '24574010' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'name' => 'Mahasiswa ' . $i,
                'study_program' => $i % 2 == 0 ? 'Teknik Informatika' : 'Sistem Informasi',
                'birth_date' => '2004-01-' . str_pad(($i % 28) + 1, 2, '0', STR_PAD_LEFT),
                'gpa' => round(3.0 + (mt_rand(0, 95) / 100), 2),
                'is_active' => $i % 5 != 0,
            ]);
        }
    }
}