<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{

    public function run(): void
    {

        Student::truncate();
  
        $json = File::get("database/data/students.json");
        $students = json_decode($json,true);
        foreach ($students as $studentData) {
            $student = new Student();
            $student->student_number = $studentData['student_number'];
            $student->name = $studentData['name'];
            $student->save();
        }
    }
}
