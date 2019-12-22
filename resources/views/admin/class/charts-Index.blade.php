@if($role=='App\Manager')
    @extends('layouts.admin')
@else
    @extends('layouts.teacherAdmin')
@endif

@section('content')

    <div class="card-header card-header-tabs deep-purple wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> کلاس  <i
                    class="fas fa-user-plus"></i> </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body row" dir="rtl">

        <div class="container  col-9" dir="rtl">
            <table class="table table-responsive text-center">
                <thead>
                <tr>
                    <th style="font-family: Sahel;font-weight: bolder">نام کلاس</th>
                    <th style="font-family: Sahel;font-weight: bolder">نمودار حضور</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($classes as $class)
                        <td style="font-family: Sahel;font-weight: bolder">{{$class->name}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('dayChart',$class->id)}}"> نمودار</a>
                        </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection




