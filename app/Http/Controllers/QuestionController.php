<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\QuestionBank;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function createQuestionBank()
    {
        return view('questionBank.create');
    }

    public function storeQuestionBank(Request $request)
    {
        $questionBank = new QuestionBank;
        $questionBank->name = $request->name;

        $questionBank->save();
        return view('home');
    }
    public function createQuestion()
    {
        $question_banks = QuestionBank::all();
        return view('questionBank.createQuestion')->with('question_banks', $question_banks);
    }

    public function storeQuestion(Request $request)
    {
        $question = new Question;
        $question->question_bank_id = $request->question_bank_id;
        $question->text = $request->text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;

        $question->save();
        return view('home');
    }
}
