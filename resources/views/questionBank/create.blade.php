@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('storeQuestionBank') }}">
    @csrf

    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Soru Bankası Adı</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="inputName">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection