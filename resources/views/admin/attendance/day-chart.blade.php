@if($role=='App\Manager')
    @extends('layouts.admin')
@else
    @extends('layouts.teacherAdmin')
@endif
@section('content')

    <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
@endsection

@section('script')

    <script>

        $(document).ready(function () {
            Highcharts.dateFormats = {
                'a': function (ts) {
                    return new persianDate(ts).format('dddd')
                },
                'A': function (ts) {
                    return new persianDate(ts).format('dddd')
                },
                'd': function (ts) {
                    return new persianDate(ts).format('DD')
                },
                'e': function (ts) {
                    return new persianDate(ts).format('D')
                },
                'b': function (ts) {
                    return new persianDate(ts).format('MMMM')
                },
                'B': function (ts) {
                    return new persianDate(ts).format('MMMM')
                },
                'm': function (ts) {
                    return new persianDate(ts).format('MM')
                },
                'y': function (ts) {
                    return new persianDate(ts).format('YY')
                },
                'Y': function (ts) {
                    return new persianDate(ts).format('YYYY')
                },
                'W': function (ts) {
                    return new persianDate(ts).format('ww')
                }
            };
            var chart = {
                zoomType: 'x'
            };
            var title = {
                text: 'نمودار وضعیت حضور کلاس'
            };
            var subtitle = {
                text: document.ontouchstart === undefined ?
                    'برای زوم کردن موس خود را روی نمودار بکشید' : 'Pinch the chart to zoom in'
            };
            var xAxis = {
                type: 'datetime',
                minRange: 7 * 24 * 3600000 // fourteen days
            };
            var yAxis = {
                title: {
                    text: 'درصد حضور'
                }
            };
            var legend = {
                enabled: false
            };
            var plotOptions = {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            };
            var series = [{
                type: 'area',
                name: 'percent',
                data: [

                        @foreach($dates as $date)
                    [Date.UTC({{$date->date}}), {{$date->percent}}],
                    @endforeach
                ]
            }];

            var json = {};
            json.chart = chart;
            json.title = title;
            json.subtitle = subtitle;
            json.legend = legend;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.series = series;
            json.plotOptions = plotOptions;
            $('#container').highcharts(json);

        });
    </script>
@endsection
