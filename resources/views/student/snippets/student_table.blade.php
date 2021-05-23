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
                    <li><a href="{{route('view_student',['student_id'=>encode_parameter($student->getId())])}}">Profile</a></li>
                    <li><a href="{{route('view_student_logbook',['student_id'=>encode_parameter($student->getId()),'week_no'=>1])}}">LogBook</a></li>
                    <li role="separator" class="divider"></li>
                </ul>

            </div>

        </td>
    </tr>
    @endforeach
</table>
