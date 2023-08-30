@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('storeQuestion') }}">
    @csrf

    <div class="mb-3 row">
        <label for="questionBankChoice" class="col-sm-2 col-form-label" >Soru Bankası Seçin </label> 
        <div class="col-sm-10">
            <select name="question_bank_id" class="form-select" id="questionBankChoice" >
                @foreach ($question_banks as $question_bank)
                    <option value="{{$question_bank->id}}">
                        {{$question_bank->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Soru:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="text" id="inputText">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputOptionA" class="col-sm-2 col-form-label">A Şıkkı:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="option_a" id="inputOptionA">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputOptionB" class="col-sm-2 col-form-label">B Şıkkı:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="option_b" id="inputOptionB">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputOptionC" class="col-sm-2 col-form-label">C Şıkkı:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="option_c" id="inputOptionC">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputOptionD" class="col-sm-2 col-form-label">D Şıkkı:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="option_d" id="inputOptionD">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection