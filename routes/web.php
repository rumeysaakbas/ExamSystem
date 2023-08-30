<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamTransactionsController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource('students', StudentController::class);
Route::get('createExam', [ExamController::class, 'createExam'])->name('createExam');
Route::post('storeExam', [ExamController::class, 'storeExam'])->name('storeExam');
Route::get('storeIndex', [ExamController::class, 'storeIndex'])->name('storeIndex');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('createQuestionBank', [QuestionController::class, 'createQuestionBank'])->name('createQuestionBank');
Route::post('storeQuestionBank', [QuestionController::class, 'storeQuestionBank'])->name('storeQuestionBank');
Route::get('createQuestion', [QuestionController::class, 'createQuestion'])->name('createQuestion');
Route::Post('storeQuestion', [QuestionController::class, 'storeQuestion'])->name('storeQuestion');

Route::get('examAnalysis', [ExamTransactionsController::class, 'examAnalysis'])->name('examAnalysis');
Route::get('composeExam', [ExamTransactionsController::class, 'composeExam'])->name('composeExam');


