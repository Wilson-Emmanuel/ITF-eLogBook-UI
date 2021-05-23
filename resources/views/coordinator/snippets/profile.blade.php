<div class="row">
    <div class="text-center col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Profile</h4></div>
            <div class="panel-body">
                <!--


                                                Table -->
                <table class="table table-striped table-active">
                    <tr>
                        <th>Full Name: </th>
                        <td>{{$coordinator->getInfo()->getFullName()}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$coordinator->getInfo()->getEmail()}}</td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>{{$coordinator->getInfo()->getPhone()}}</td>
                    </tr>
                    <tr>
                        <th>Department: </th>
                        <td>{{$coordinator->getDepartment()}}</td>
                    </tr>
                </table>
                <h4 class="text-secondary">School Details</h4>
                <table class="table table-striped table-active">
                    <tr>
                        <th>School Name: </th>
                        <td>{{$coordinator->getSchool()->getName()}}</td>
                    </tr>
                    <tr>
                        <th>School Address: </th>
                        <td>{{$coordinator->getSchool()->getAddress()}}</td>
                    </tr>
                    <tr>
                        <th>State: </th>
                        <td>{{$coordinator->getSchool()->getStateName()}}</td>
                    </tr>
                    @if(isAdmin())
                        <tr>
                            <th>&nbsp;</th>
                            <td>
                                <a href="{{route('show_coordinator_students',['email'=>$coordinator->getInfo()->getEmail()])}}">View Coordinator's Students</a>
                            </td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>

    </div>

</div>
