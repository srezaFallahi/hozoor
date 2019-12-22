@if($role=='App\Manager')
    @extends('layouts.admin')
    @else
    @extends('layouts.teacherAdmin')
@endif

@section('content')
    <div class="card-header card-header-tabs deep-purple wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"><i
                    class="fas fa-user-plus"></i>  وضعیت حضور و غیاب کلاس {{$class->name}}  </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body row" dir="rtl">

        <div class="container table-responsive col-9" dir="rtl">
            <table class="table  text-center">
                <thead>
                <tr>
                    <th style="font-family: Sahel;font-weight: bolder">جلسه</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام دانش آموز</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام خانوادگی</th>
                    <th style="font-family: Sahel;font-weight: bolder">تاریخ</th>
                    <th style="font-family: Sahel;font-weight: bolder"> وضعیت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($attendances as $attendance)
                    @foreach($student->users as $user)


                        <tr>
                            <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                            <td style="font-family: Sahel;font-weight: normal">
                                {{$user->first_name}}
                            </td>
                            <td style="font-family: Sahel;font-weight: normal">

                                {{$user->last_name}}

                            </td>
                            <td style="font-family: Sahel;font-weight: normal">{{$attendance->date}}</td>

                            <td style="font-family: Sahel;font-weight: normal">
                                @if($attendance->attendance==1)
                                    <span class="text-white bg-default col-2">حاضر</span>
                                @else
                                    <span class="text-white bg-danger col-2 ">غایب</span>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>

    </div>



@endsection
@section('out-card')
    <div id="chart_div"></div>

@endsection
@section('script')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable
            ([['جلسه', 'وضعیت'],
                    @foreach($attendances as $attendance)

                ['جلسه {{$chartNum++}}', {{ $attendance->attendance}}],
                @endforeach

            ]);

            var options = {
                legend: 'none',
                hAxis: {minValue: 0, maxValue: 100},
                curveType: 'function',
                pointSize: 10,
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
