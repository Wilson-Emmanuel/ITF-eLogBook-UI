<div class="row">
    <div class="text-center col-xs-8 col-xs-offset-2 col-md-5 col-md-offset-1 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Personal Details</h4></div>
            <div class="panel-body">

                <table class="table table-striped table-active">
                    <tr>
                        <th>Full Name: </th>
                        <td>{{$student->getInfo()->getFullName()}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$student->getInfo()->getEmail()}}</td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>{{$student->getInfo()->getPhone()}}</td>
                    </tr>
                    <tr>
                        <th>Reg No.: </th>
                        <td>{{$student->getRegNo()}}</td>
                    </tr>
                    @if(!isStudent())
                    <tr>
                        <th>&nbsp;</th>
                        <td>
                            <a href="{{route('view_student_logbook',['student_id'=>encode_parameter($student->getId()),'week_no'=>1])}}">View {{$student->getInfo()->getFirstName()}}'s Log Book</a>
                        </td>
                    </tr>
                    @endif

                </table>
            </div>
        </div>

    </div>
    <div class="text-center col-xs-8 col-xs-offset-2 col-md-5 col-md-offset-1 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Bank Details</h4></div>
            <div class="panel-body">

                <table class="table table-striped table-active">
                    @if(!isManager())
                    <tr>
                        <th>Payment Status: </th>
                        <td>
                            @if($student->isPaid())
                            <span class="badge badge-success" style="background-color: yellowgreen; color: white;">Paid</span>
                            @else
                                    @if(isAdmin())
                                    <form class="form" action="/itf/pay" method="post">
                                        {{ csrf_field() }}
                                        @error('message')
                                        <div class='alert alert-danger'>
                                                      <span>
                                                        {{$message}}</span>
                                        </div>
                                        @enderror

                                        <input type="hidden" name="studentId" value="{{$student->getId()}}">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Pay Student</button>
                                    </form>
                                    @else
                                    <span class="badge " style="color: white; background-color: darkred;">Not Paid</span>
                                    @endif

                            @endif
                        </td>
                    </tr>
                    @endif
                    @if(isStudent())
                        <tr>
                            <th>&nbsp;</th>
                            <td> <a href="{{route('student_update_bank')}}" class=" btn-primary btn-sm" >Update Bank Details</a></td>
                        </tr>
                    @endif
                    <tr>
                        <th>Account Name: </th>
                        <td>{{$student->getAccountName()}}</td>
                    </tr>
                    <tr>
                        <th>Account Number: </th>
                        <td>{{$student->getAccountNumber()}}</td>
                    </tr>
                    <tr>
                        <th>Bank Name: </th>
                        <td>{{$student->getBankName()}}</td>
                    </tr>
                    <tr class="d-none d-md-block">
                        <th>Bank Sort Code: </th>
                        <td>{{$student->getBankSortCode()}}</td>
                    </tr>

                </table>
            </div>
        </div>

    </div>
</div><!--End of row -->

<div class="row">
    <div class="text-center col-xs-8 col-xs-offset-2 col-md-5 col-md-offset-1 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">School Details</h4></div>
            <div class="panel-body">

                <table class="table table-striped table-active">

                    <tr>
                        <th>Coordinator's Name: </th>
                        <td>{{$student->getCoordinatorName()}}</td>
                    </tr>
                    <tr>
                        <th>Coordinator's Email: </th>
                        <td>{{$student->getCoordinatorEmail()}}</td>
                    </tr>
                    <tr>
                        <th>Coordinator's Phone: </th>
                        <td>{{$student->getCoordinatorPhone()}}</td>
                    </tr>
                    <tr>
                        <th>Department: </th>
                        <td>{{$student->getDepartment()}}</td>
                    </tr>
                    <tr>
                        <th>School Name: </th>
                        <td>{{$student->getSchoolName()}}</td>
                    </tr>
                    <tr>
                        <th>School Address: </th>
                        <td>{{$student->getSchoolAddress()}}</td>
                    </tr>
                    <tr>
                        <th>School State: </th>
                        <td>{{$student->getSchoolState()}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="text-center col-xs-8 col-xs-offset-2 col-md-5 col-md-offset-1 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Company Details</h4></div>
            <div class="panel-body">

                <table class="table table-striped table-active">
                    <tr>
                        <th>Manager's Name: </th>
                        <td>{{$student->getManagerName()}}</td>
                    </tr>
                    <tr>
                        <th>Manager's Email: </th>
                        <td>{{$student->getManagerEmail()}}</td>
                    </tr>
                    <tr>
                        <th>Manager's Phone: </th>
                        <td>{{$student->getManagerPhone()}}</td>
                    </tr>

                    <tr>
                        <th>Company Name: </th>
                        <td>{{$student->getCompanyName()}}</td>
                    </tr>
                    <tr>
                        <th>Company Type: </th>
                        <td>{{$student->getCompanyType()}}</td>
                    </tr>
                    <tr>
                        <th>Company Address: </th>
                        <td>{{$student->getCompanyAddress()}}</td>
                    </tr>
                    <tr>
                        <th>Company State: </th>
                        <td>{{$student->getCompanyState()}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div><!--End of row -->
