@extends('layouts.admin')

@section('content')
    <div class="card-header card-header-tabs  warning-color wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> جدول مدیران  <i
                    class="fas fa-user-plus"></i> </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body" dir="rtl">

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
                    <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                    <th style="font-family: Sahel;font-weight: bolder">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($managers as $managerTemp)
                    @foreach($managerTemp->users as $manager)
                        <tr>

                            <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                            <td style="font-family: Sahel;font-weight: normal">{{$manager->first_name}}</td>
                            <td style="font-family: Sahel;font-weight: normal">{{$manager->last_name}}</td>
                            <td>@if($manager->is_active==1)
                                    <form action="{{route('teacher.update',$managerTemp->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="hidden" name="first_name" value="{{$manager->first_name}}">
                                        <input type="hidden" name="last_name" value="{{$manager->last_name}}">
                                        <input type="hidden" name="password" value="{{$manager->password}}">
                                        <input type="hidden" name="password_confirmation"
                                               value="{{$manager->password}}">
                                        <input type="hidden" name="username" value="{{$manager->username}}">
                                        <input type="hidden" name="email" value="{{$manager->email}}">
                                        <button style="font-family: Sahel;font-weight: bold" class="btn btn-success">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('teacher.update',$managerTemp->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="is_active" value="1">
                                        <input type="hidden" name="first_name" value="{{$manager->first_name}}">
                                        <input type="hidden" name="last_name" value="{{$manager->last_name}}">
                                        <input type="hidden" name="password" value="{{$manager->password}}">
                                        <input type="hidden" name="password_confirmation"
                                               value="{{$manager->password}}">
                                        <input type="hidden" name="username" value="{{$manager->username}}">
                                        <input type="hidden" name="email" value="{{$manager->email}}">
                                        <div class="perspective color-8">
                                            <button style="font-family: Sahel;font-weight: bold"
                                                    class="btn btn-danger">
                                                غیرفعال
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </td>
                            <td style="font-family: Sahel;font-weight: normal">{{$manager->username}}</td>
                            <td style="font-family: Sahel;font-weight: normal">{{$manager->email}}</td>
                            <td style="font-family: Sahel;font-weight: normal;">
                                <form action="{{route('teacher-class')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="teacher_id" value="{{$managerTemp->id}}">
                                    <input type="submit" class="btn btn-primary text-white" value="کلاس ها"
                                           style="font-family: Sahel;font-weight: bold;">

                                </form>
                            </td>
                            <td style=" font-family: Sahel;font-weight:bold;">
                                <a href="{{route('teacher.edit',$managerTemp->id)}}" class="btn btn-1 btn-1b ">
                                    ویرایش<i class="fas fa-user-edit"></i></a>
                            </td>

                            <td style="font-family: Sahel;font-weight: normal">
                                <form action="{{route('teacher.destroy',$managerTemp->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-5 btn-5a icon-remove  color-2 text-white form-control">
                                        <span>حذف</span></button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection

