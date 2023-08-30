@extends('layouts.app')
@php
    $counter=1;
@endphp

@section('content')
<div class="mb-5">
    <form class="d-flex" role="search" method="get" action="{{ route('students.store') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Öğrenci Adına Göre Arama" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Öğrenci numarası</th>
            <th scope="col">Adı</th>
            <th scope="col">Eklenme Tarihi</th>
            <th scope="col">Güncellenme Tarihi</th>
            <th scope="col">Düzenle</th>
            <th scope="col">Sil</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{ $counter++; }}</th>
                <td>{{ $student->student_number}} </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
                <td>
                    <a class="btn btn-secondary" href="{{ route('students.edit', $student) }}" role="button" style="width:90px;">Düzenle</a>
                </td>
                <td>
                    <form method="post" action="{{ route('students.destroy', $student) }}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit" style="width:90px;">Sil</button>
                    </form>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
@endsection