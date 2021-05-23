@extends('itf.itf_dash')
@section('content')
<div class="row">
    <div class="text-center col-xs-12 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Students</h4></div>
            <div class="panel-body">
                @include('student.snippets.student_table')
            </div>
        </div>
    </div>
</div>
@endsection
