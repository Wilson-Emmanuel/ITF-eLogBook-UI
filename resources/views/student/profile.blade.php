@extends('student.dash')
@section('content')
<h1>Hello, {{$student->getInfo()->getFullName()}}</h1>
@include('student.snippets.profile')
@endsection
