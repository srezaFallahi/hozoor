@extends('layouts.admin')
@section('header')
    add teacher
@endsection

@section('content')

    <div class="container table-responsive" dir="rtl">
        <table class="table  text-center">
            <thead>
            <tr>
                <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                <th style="font-family: Sahel;font-weight: bolder">نام</th>
                <th style="font-family: Sahel;font-weight: bolder">نام خانوادگی</th>
                <th style="font-family: Sahel;font-weight: bolder">وضعیت</th>
                <th style="font-family: Sahel;font-weight: bolder">یوزرنیم</th>
                <th style="font-family: Sahel;font-weight: bolder">ایمیل</th>
                <th style="font-family: Sahel;font-weight: bolder">کلاس ها</th>
                <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                <th style="font-family: Sahel;font-weight: bolder">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr>

                    <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                    <td style="font-family: Sahel;font-weight: normal">{{$teacher->first_name}}</td>
                    <td style="font-family: Sahel;font-weight: normal">{{$teacher->last_name}}</td>
                    <td>@if($teacher->is_active==1)
                            <p style="font-family: Sahel;font-weight: normal" class="text-success"> فعال </p>

                        @else
                            <p style="font-family: Sahel;font-weight: normal" class="text-danger">غیر فعال </p>
                        @endif</td>
                    <td style="font-family: Sahel;font-weight: normal">{{$teacher->username}}</td>
                    <td style="font-family: Sahel;font-weight: normal">{{$teacher->email}}</td>
                    <td style="font-family: Sahel;font-weight: normal"><a href="#" class="btn btn-1 btn-1b">
                            کلاس ها</a>
                    </td>
                    <td style="font-family: Sahel;font-weight: normal"><a href="#" class="btn btn-1 btn-1b">
                            ویرایش</a>
                    </td>

                    <td style="font-family: Sahel;font-weight: normal"><a href="#"
                                                                          class="btn btn-5 btn-5a icon-remove  color-2 text-light">
                            <span>حذف</span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
