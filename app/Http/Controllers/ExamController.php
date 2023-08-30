<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function createExam(){

        return view('exam.create');
    }

    public function storeExam(Request $request){
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->exam_date= $request->exam_date;
        $exam->exam_time = $request->exam_time;
        $exam->passing_score = $request->passing_score;
        $exam->explanation = $request->explanation;
        $exam->save();

        return redirect()->route('storeIndex');
    }

    public function storeIndex(){
        $exams=Exam::all();
        return view('exam.index', compact('exams'));
    }
}
