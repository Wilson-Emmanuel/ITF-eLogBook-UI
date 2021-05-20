@extends('student.dash')
@section('content')
<h2>Hello, {{$student->getInfo()->getFullName()}}</h2>
@include('student.snippets.logbook')
@endsection
