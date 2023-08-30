@extends('layouts.app')
@php
    $counter=1;
@endphp

@section('content')
    <form class="d-flex" method="get" action="{{ route('examAnalysis') }}">
        @csrf
        <div class="col-sm-3">
            <select name="exam_id" class="form-select">
                <option selected>Sınav Seçiniz</option>
                @foreach ($exams as $exam)
                    <option value="{{$exam->id}}">
                        {{$exam->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3 ms-2">
            <select name="sorting" class="form-select" id="selectedSorting">
                <option selected>Sıralama Seçiniz</option>
                <option value="0">Başarılı Öğrenci  &#8593; </option>
                <option value="1">Başarısız Öğrenci  &#8593; </option>
                <option value="2">Sadece Başarılı Öğrenciler</option>
                <option value="3">Sadece Başarısız Öğrenciler</option>
            </select>
        </div>
        <button class="btn btn-outline-success ms-2" type="submit" name="filter">Filtrele</button>
    </form>

<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Öğrenci numarası</th>
            <th scope="col">Öğrenci Adı</th>
            <th scope="col">Sınav</th>
            <th scope="col">Aldığı Puan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <th scope="row">{{ $counter++; }}</th>
                <td>{{ $transaction->student->student_number}} </td>
                <td>{{ $transaction->student->name }}</td>
                <td>{{ $transaction->exam->name }}</td>
                <td>{{ $transaction->score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection