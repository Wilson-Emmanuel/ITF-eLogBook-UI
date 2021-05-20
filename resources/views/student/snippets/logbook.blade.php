<div class="row">
    <div class=" col-xs-10 col-xs-offset-1 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Log Book</h4></div>
            <div class="panel-body">
                <table class="table table-striped table-active">
                    <tr>
                        @isset($pageMessage)
                        <div class='alert alert-success'>
                                          <span>
                                            {{$pageMessage}}</span>
                        </div>
                        @endisset
                        @error('message')
                        <div class='alert alert-danger'>
                                                  <span>
                                                    {{$message}}</span>
                        </div>
                        @enderror
                    </tr>
                    <tr>
                        <th>Coordinator's Remark:</th>
                        <td>{{$student->getCoordinatorRemark()}}</td>
                    </tr>
                    <tr>
                        <th>Log Book Signature Status</th>
                        <td>
                            @if($student->isLogBookSigned())
                            <span class="badge badge-success" style="background-color: yellowgreen; color: white;">Signed</span>
                            <form class="form" action="/itf/unsign_logbook" method="post">
                                {{ csrf_field() }}
                                @error('message')
                                <div class='alert alert-danger'>
                                              <span>
                                                {{$message}}</span>
                                </div>
                                @enderror
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Unsign</button>

                            </form>
                            @else
                            <span class="badge " style="color: white; background-color: darkred;">Not Signed</span>
                            @if(isAdmin())
                            <form class="form" action="/itf/sign_logbook" method="post">
                                {{ csrf_field() }}
                                @error('message')
                                <div class='alert alert-danger'>
                                          <span>
                                            {{$message}}</span>
                                </div>
                                @enderror
                                <input type="hidden" name="weekNo" value="{{$weekNo}}">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Sign</button>

                            </form>
                            @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Start Date:</th>
                        <td>{{$student->getStartDate()}}</td>
                    </tr>
                    <tr>
                        <th>Weeks:</th>
                        <td>{{count($student->getWeeks())}}</td>
                    </tr>

                </table>

                <table class="table table-striped table-active">
                    @if(isset($week))

                    <thead >
                    <tr>
                        <th colspan="2" style="width: 50%;">Week <span class="badge badge-info">{{$weekNo}}</span> Signature Status: </th>
                        <td style="width: 50%;">
                            @if($week->isSigned())
                            <span class="badge badge-success" style="background-color: yellowgreen; color: white;">Signed</span>
                            @else
                            <span class="badge " style="color: white; background-color: darkred;">Not Signed</span>
                            @if(isManager())
                            <form class="form" action="/manager/sign_week" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="weekNo" value="{{$weekNo}}">
                                <input type="hidden" name="start" value="{{$startDay}}">
                                <input type="hidden" name="end" value="{{$endDay}}">
                                <input type="hidden" name="studentId" value="{{encode_parameter($student->getId())}}">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Sign</button>

                            </form>
                            @endif
                            @endif
                        </td>

                    </tr>

                    <tr style="background-color: #d3d3d3;">
                        <th style="width: 20%;">Day</th>
                        <th style="width: 65%;">Task</th>
                        <th style="width: 15%;">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($week->getDays() as $day)
                    <tr>
                        <td style="width: 20%;">{{date("D, jS M, Y",strtotime($day->getDate()))}}</td>
                        <td style="width: 65%;">{{$day->getTask()}}</td>
                        <td style="width: 15%;">
                            <div class="btn-group">
                                @if($day->isEditable() && isStudent())
                                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('student_show_fill_logbook',['week'=>$weekNo-1,'day'=>$loop->index])}}">Enter task</a></li>

                                    <li role="separator" class="divider"></li>
                                </ul>
                                @else
                                <a class="btn btn-default dropdown-toggle disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h"></span>
                                </a>
                                @endif
                            </div>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    @else
                    <tr><td>Invalid week no</td></tr>
                    @endif
                </table>
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">

                        @if($weekNo > $start)
                        <li>
                            @if(isStudent())
                            <a href="{{route('student_show_logbook',['week_no'=>$weekNo-1])}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            @elseif(isManager())
                            <a href="{{route('manager_view_student_logbook',['student_id'=>encode_parameter($student->getId()), 'week_no'=>$weekNo-1])}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            @endif
                        </li>
                        @endif
                        @for ($i = $start; $i <= $end; $i++)
                            @if(isStudent())
                                <li class="@if($i == $weekNo) {{'active'}} @endif"><a  href="{{route('student_show_logbook',['week_no'=>$i])}}">{{$i}}</a></li>
                            @elseif(isManager())
                                <li class="@if($i == $weekNo) {{'active'}} @endif"><a  href="{{route('manager_view_student_logbook',['student_id'=>encode_parameter($student->getId()),'week_no'=>$i])}}">{{$i}}</a></li>
                            @endif
                        @endfor

                        @if($weekNo < $end)
                        <li>
                            @if(isStudent())
                                <a href="{{route('student_show_logbook',['week_no'=>$weekNo+1])}}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            @elseif(isManager())
                                <a href="{{route('manager_view_student_logbook',['student_id'=>encode_parameter($student->getId()), 'week_no'=>$weekNo+1])}}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            @endif
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>


        </div>

    </div>

</div>
