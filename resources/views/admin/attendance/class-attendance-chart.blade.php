@if($role=='App\Manager')
    @extends('layouts.admin')
@else
    @extends('layouts.teacherAdmin')
@endif

@section('content')
    <div id="chart_div"></div>
@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['نام کلاس ها', 'درصد حضور', 'میانگین'],
                    @foreach($classes as $class)
                ['{{$class->name}}', {{$class->percent}}, {{$average}}],
                @endforeach


            ]);

            var options = {
                title: 'نمودار ',
                vAxis: {title: 'درصد'},
                hAxis: {title: 'نام کلاس ها'},
                seriesType: 'bars',
                series: {1: {type: 'line'}},
                colors: ['#4b5bed', '#111111']
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
