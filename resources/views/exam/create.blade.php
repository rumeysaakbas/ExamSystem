@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('storeExam') }}">
    @csrf

    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Sınav Adı</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="inputName">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Sınav Tarihi</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="exam_date" id="inputDate">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputTime" class="col-sm-2 col-form-label">Sınav Süresi</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="exam_time" id="inputTime">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputScore" class="col-sm-2 col-form-label">Geçme Puanı</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="passing_score" id="inputScore">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputExplanation" class="col-sm-2 col-form-label">Açıklama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="explanation" id="inputExplanation">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection