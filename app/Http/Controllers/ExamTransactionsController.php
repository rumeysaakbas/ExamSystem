<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentExamScore;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class ExamTransactionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function examAnalysis(Request $request)
    {
        $exams = Exam::all();
        if ($request->has('filter')) {
            $selected_exam_id = $request->input('exam_id');
            $sorting = $request->input('sorting');
            switch ($sorting) {
                case 0:
                    $transactions = StudentExamScore::where('exam_id', $selected_exam_id)->orderBy('score', 'desc')->get();
                    break;
                case 1:
                    $transactions = StudentExamScore::where('exam_id', $selected_exam_id)->orderBy('score', 'asc')->get();
                    break;
                case 2:
                    $transactions = StudentExamScore::join('exams', 'student_exam_scores.exam_id', '=', 'exams.id')
                        ->where('student_exam_scores.exam_id', $selected_exam_id)
                        ->whereColumn('student_exam_scores.score', '>', 'exams.passing_score')
                        ->select('student_exam_scores.*')
                        ->orderBy('student_exam_scores.score', 'asc')
                        ->get();
                    break;
                case 3:
                    $transactions = StudentExamScore::join('exams', 'student_exam_scores.exam_id', '=', 'exams.id')
                        ->where('student_exam_scores.exam_id', $selected_exam_id)
                        ->whereColumn('student_exam_scores.score', '<', 'exams.passing_score')
                        ->select('student_exam_scores.*')
                        ->orderBy('student_exam_scores.score', 'asc')
                        ->get();
                    break;
                default:
                    break;
            }
        } else {
            $transactions = StudentExamScore::all();
        }
        return view('exam_transactions.analysis', compact('transactions', 'exams'));
    }
   

    public function composeExam()
    {   
        $students = Student::limit(10)->get();
        $questions = Question::all()->toArray();

        $all_assigned_questions = [];
        $j = 0;
        $question_count = 5;
        foreach ($students as $student) {
            $student_questions = [];
            
            for ($i = 0; $i < $question_count; $i++) 
            {
                if($j == count($questions)){ $j = 0; }
                $question = $questions[$j];
                $student_questions[] = [
                    //"question_id" => $question['id'],
                    "question_bank_id" => $question['question_bank_id'],
                    "text" => $question['text'],
                    "option_a" => $question['option_a'],
                    "option_b" => $question['option_b'],
                    "option_c" => $question['option_c'],
                    "option_d" => $question['option_d'],
                ];
                $j++;
            }
            $j -= 2 ;
            
            $assigned_questions = [
                "student_id" => $student->id,
                "student_number" => $student->student_number,
                "student_name" => $student->name,
                "student_questions" => $student_questions,
            ];

            $all_assigned_questions[] = $assigned_questions;
            $questions = array_merge($questions, $student_questions);
        }


        $jsonFile = database_path('data\assignedQuestions.json');
        File::put($jsonFile, json_encode($all_assigned_questions, JSON_PRETTY_PRINT));
        
        return view('exam_transactions.compose_exam', compact('jsonFile'));
    }
}
