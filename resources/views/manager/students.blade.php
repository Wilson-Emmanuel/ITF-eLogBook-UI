@extends('manager.dash')
@section('content')

<div class="row">
    <div class="text-center col-xs-12 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Students</h4></div>
            <div class="panel-body">
                <table class="table table-striped table-active">
                    <thead style="background-color: #d3d3d3;">
                    <tr>
                        <th>Name</th>
                        <th>Institution</th>
                        <th>Department</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->getInfo()->getFullName()}}</td>
                            <td>{{$student->getSchoolName()}}, {{$student->getSchoolAddress()}}</td>
                            <td>{{$student->getDepartment()}}</td>
                            <td >
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fas fa-ellipsis-h"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('manager_view_student',['student_id'=>encode_parameter($student->getId())])}}">Student details</a></li>
                                        <li><a href="{{route('manager_view_student_logbook',['student_id'=>encode_parameter($student->getId()),'week_no'=>1])}}">Student Log Book</a></li>
                                        <li role="separator" class="divider"></li>
                                    </ul>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">

                        @if($current > 0 && $current < $pages)
                        <li>
                            <a href="{{route('manager_show_students',['current'=>$current-1])}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif
                        @for ($i = 0; $i < $pages; $i++)
                        <li class="@if($i == $current) {{'active'}} @endif"><a  href="{{route('manager_show_students',['current'=>$i])}}">{{$i+1}}</a></li>
                        @endfor

                        @if($current < $pages-1 && $current >=0)
                        <li>
                            <a href="{{route('manager_show_students',['current'=>$current+1])}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>

    </div>

</div>

@endsection
