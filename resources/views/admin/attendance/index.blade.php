@extends('layouts.admin')
@section('content')
    <div class="card-header card-header-tabs  blue wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"><i
                    class="fas fa-user-plus"></i>   دانش آموزان   </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body" dir="rtl">
        <form action="{{route('doAttendance',$class->id)}}" method="post">
            @csrf

            <div class="container-fluid table-responsive" dir="rtl">

                <table class="table  text-center">
                    <thead>
                    <tr>

                        <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                        <th style="font-family: Sahel;font-weight: bolder">حاضر</th>
                        {{--                        <th style="font-family: Sahel;font-weight: bolder">غایب</th>--}}
                        <th style="font-family: Sahel;font-weight: bolder">نام</th>
                        <th style="font-family: Sahel;font-weight: bolder">نام خانوادگی</th>
                        <th style="font-family: Sahel;font-weight: bolder">نام پدر</th>
                        <th style="font-family: Sahel;font-weight: bolder">شماره ملی</th>
                        <th style="font-family: Sahel;font-weight: bolder">تاریخ تولد</th>
                        <th style="font-family: Sahel;font-weight: bolder">تاریخ ورود</th>
                        <th style="font-family: Sahel;font-weight: bolder">مقطع</th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($students as $student)

                        @foreach($student->users as $user)

                            <tr>

                                <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                                <td>
                                    <input type="checkbox" class="checkBoxes"
                                           id="{{$student->id}}"
                                           onclick="check({{$student->id}})"
                                           value="{{$student->id}}"
                                           name="attendanceArray[]">

                                    <input type="hidden" class="checkBoxes"
                                           value="{{$student->id}}"
                                           id="{{$student->id}}h"
                                           name="attendanceFalseArray[]">

                                </td>


                                <td style="font-family: Sahel;font-weight: normal">{{$user->first_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$user->last_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->dad_name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$user->code}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->birth_day}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->entry_date}}</td>
                                <td style="font-family: Sahel;font-weight: normal">{{$student->grade->name}}</td>
                                <td style="font-family: Sahel;font-weight: normal">
                                </td>
                            </tr>
                        @endforeach
                    @endforeach


                    </tbody>
                </table>


            </div>
            <input type="submit" value="تایید حضور غیاب" id="s" class="btn btn-success">
        </form>
    </div>


@endsection
@section('script')
    <script>
        function check(id) {
            if (document.getElementById(id).checked) {
                document.getElementById(id + 'h').disabled = true;
            }

        }
    </script>
@endsection




