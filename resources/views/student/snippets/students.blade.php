<div class="row">
    <div class="text-center col-xs-12 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Students</h4></div>
            <div class="panel-body">

                @include('student.snippets.student_table')

                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">

                        @if($current > 0 && $current < $pages)
                        <li>
                            <a href="{{route('show_students',['current'=>$current-1])}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif
                        @for ($i = 0; $i < $pages; $i++)
                        <li class="@if($i == $current) {{'active'}} @endif"><a  href="{{route('show_students',['current'=>$i])}}">{{$i+1}}</a></li>
                        @endfor

                        @if($current < $pages-1 && $current >=0)
                        <li>
                            <a href="{{route('show_students',['current'=>$current+1])}}" aria-label="Next">
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
