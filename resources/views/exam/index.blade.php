@extends('layouts.app')
@php
    $counter=1;
@endphp

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sınav Adı</th>
            <th scope="col">Sınav Tarihi</th>
            <th scope="col">Sınav Süresi</th>
            <th scope="col">Geçme Notu</th>
            <th scope="col">Açıklama</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exams as $exam)
            <tr>
                <th scope="row">{{ $counter++; }}</th>
                <td>{{ $exam->name}} </td>
                <td>{{ $exam->exam_date }}</td>
                <td>{{ $exam->exam_time }}</td>
                <td>{{ $exam->passing_score }}</td>
                <td>{{ $exam->explanation }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection