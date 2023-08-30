@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body ms-5 me-5 mb-3">    
                    <div class="row">
                        <a href="{{ route('students.index') }}" type="button" class="mt-3 btn btn-outline-primary btn-lg">Öğrenciler</a>
                    </div>          
                    <div class="row">
                        <a href="{{ route('students.create') }}" type="button" class="mt-3 btn btn-outline-primary btn-lg">Öğrenci Ekle</a>   
                    </div>
                    <div class="row">
                        <a href="{{ route('createExam') }}" type="button" class=" mt-3 btn btn-outline-primary btn-lg">Sınav Ekle</a>
                    </div>
                    <div class="row">
                        <a href="{{ route('createQuestionBank') }}" type="button" class=" mt-3 btn btn-outline-primary btn-lg">Soru Bankası Ekle</a>
                    </div>
                    <div class="row">
                        <a href="{{ route('createQuestion') }}" type="button" class=" mt-3 btn btn-outline-primary btn-lg">Soru Ekle</a>
                    </div>
                    <div class="row">
                        <a href="{{ route('examAnalysis') }}" type="button" class=" mt-3 btn btn-outline-primary btn-lg">Sınav Analizi</a>
                    </div>
                    <div class="row">
                        <a href="{{ route('composeExam') }}" type="button" class=" mt-3 btn btn-outline-primary btn-lg">Sınav Oluştur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
