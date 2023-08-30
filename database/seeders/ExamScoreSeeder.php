<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Student;
use App\Models\Exam;
use App\Models\StudentExamScore;

class ExamScoreSeeder extends Seeder
{
    public function run(): void
    {
        
        Student::truncate();
  
        $json = File::get("database/data/exam_scores.json");
        $exam_scores = json_decode($json,true);

        foreach ($exam_scores as $exam_score) {
            $student_exam_score = new StudentExamScore();
            $student_exam_score->student_id = $exam_score['student_id'];
            $student_exam_score->exam_id = $exam_score['exam_id'];
            $student_exam_score->score = $exam_score['score'];
            $student_exam_score->save();
        }
    }
}
