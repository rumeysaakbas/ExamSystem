@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('students.store') }}">
    @csrf

    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Öğrenci Ad Soyad</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="inputName">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputStudentNumber" class="col-sm-2 col-form-label">Öğrenci Numarası</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="student_number" id="inputStudentNumber">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection