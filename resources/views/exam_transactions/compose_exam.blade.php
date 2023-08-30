@extends('layouts.app')

@section('content')

@php
    $counter = 1;
    $jsonContent = file_get_contents($jsonFile);
    $jsonData = json_decode($jsonContent, true);
@endphp

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Öğrenci numarası</th>
            <th scope="col">Adı</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Soruları</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($jsonData as $student)
            <tr>
                <th scope="row">{{ $counter++; }}</th>
                <td>{{ $student['student_number'] }} </td>
                <td>{{ $student['student_name'] }}</td>                       
                <ul class="list-group">
                    @foreach( $student['student_questions'] as $question)
                        <td>
                            <li class="list-group-item text-sm">{{ $question['text'] }}</li>
                            <li class="list-group-item text-sm">{{ $question['option_a'] }}</li>
                            <li class="list-group-item text-sm">{{ $question['option_b'] }}</li>
                            <li class="list-group-item text-sm">{{ $question['option_c'] }}</li>
                            <li class="list-group-item text-sm">{{ $question['option_d'] }}</li>
                        </td>
                    @endforeach
                </ul>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
