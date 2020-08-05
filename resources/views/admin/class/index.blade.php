@extends('layouts.admin')
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
                    <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام کلاس</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام استاد</th>
                    <th style="font-family: Sahel;font-weight: bolder">مقطع</th>
                    <th style="font-family: Sahel;font-weight: bolder">روز ها</th>
                    <th style="font-family: Sahel;font-weight: bolder">اضافه کردن دانش آموز</th>
                    <th style="font-family: Sahel;font-weight: bolder">اعضا کلاس</th>
                    <th style="font-family: Sahel;font-weight: bolder">حضور و غیاب</th>
                    <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                    <th style="font-family: Sahel;font-weight: bolder">حذف</th>
                    <th style="font-family: Sahel;font-weight: bolder">نمودار</th>
                    <th style="font-family: Sahel;font-weight: bolder">درصد حضور</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)

                    <tr>
                        <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                        <td style="font-family: Sahel;font-weight: normal">{{$class->name}}</td>
                        @foreach($class->teacher->users as $user)
                            <td style="font-family: Sahel;font-weight: normal">{{$user->first_name}} {{$user->last_name}}</td>
                        @endforeach
                        <td style="font-family: Sahel;font-weight: normal" class="col-lg-3">
                            <select value="1">


                                @foreach($class->days as $day)

                                    <option name="" id="">{{$day->name}}</option>

                                @endforeach
                            </select>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">{{$class->grade->name}}</td>
                        <td style="font-family: Sahel;font-weight: normal">

                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-primary btn-rounded mb-4 col-sm-12"
                                        data-toggle="modal"
                                        data-target="#class-{{$class->id}}">
                                    اضافه کن
                                </button>
                            </div>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('show-student')}}" method="post">
                                @csrf
                                <input type="hidden" name="room_id" value="{{$class->id}}">
                                <input type="submit" class="btn btn-warning btn-rounded mb-4" value="اعضاکلاس">
                            </form>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('attendance.show',$class->id)}}">
                                <button @if($class->day1 != 1 . '') disabled @endif
                                class="btn btn-info btn-rounded mb-4"
                                        type="submit">
                                    حضورغیاب
                                </button>

                            </form>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">

                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-default btn-rounded mb-4"
                                        data-toggle="modal"
                                        data-target="#grade-{{$class->id}}">
                                    ویرایش
                                </button>
                            </div>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('class.destroy',$class->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-5 btn-5a icon-remove  color-2 text-white form-control col-1">
                                    <span>حذف</span></button>
                            </form>
                        </td>
                        <td class="col-2">
                            <form action="{{route('dayChart',$class->id)}}" method="get">
                                @csrf

                                <input type="submit" class="btn btn-primary" value="نمودار">
                            </form>

                        </td>
                        <td style="font-family: Sahel;font-weight: bold">{{$class->percent}}%</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @permission('teacher-controller')
    <div class="text-center wow fadeInRight">
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
           data-target="#modalLoginForm45">اضافه</a>
    </div>
    @endpermission

@endsection
@section('out-card')
    <div class="modal fade" id="modalLoginForm45" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" dir="rtl"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">اضافه کردن کلاس</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('class.store')}}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"
                                   class="col-12 text-right text-dark"> <i class="fas fa-graduation-cap"></i>
                                نام کلاس</label>

                            <input type="text" id="defaultForm-email" name="name" class="form-control validate">
                            @error('name')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Material input -->
                        <div class=" form-group">
                            <label for="inputAddressMD" class=" col-12 text-right"
                                   style="font-family: Sahel;font-weight: bold;color: black">مقطع</label>
                            <select class="browser-default custom-select" name="grade_id">
                                <option selected>مقطع</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        </div>
                        <!-- Material input -->
                        <div class=" form-group">
                            <label for="inputAddressMD" class=" col-12 text-right"
                                   style="font-family: Sahel;font-weight: bold;color: black">معلم</label>
                            <select class="browser-default custom-select" name="teacher_id">
                                <option selected>معلم</option>
                                @foreach($teachers as $teacher)
                                    @foreach($teacher->users as $user)
                                        <option
                                            value="{{$teacher->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('grade_id')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row text-right">
                            <div class="col-3">
                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="1"> شنبه</lable>
                                <input type="checkbox" value="1" name="daysArray[]" id="1">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="2"> یکشنبه</lable>
                                <input type="checkbox" value="2" name="daysArray[]" id="2">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="3"> دوشنبه</lable>
                                <input type="checkbox" value="3" name="daysArray[]" id="3">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="4"> سه شنبه
                                </lable>
                                <input type="checkbox" value="4" name="daysArray[]" id="4">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="5"> چهارشنبه
                                </lable>
                                <input type="checkbox" value="5" name="daysArray[]" id="5">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="6"> پنج شنبه
                                </lable>
                                <input type="checkbox" value="6" name="daysArray[]" id="6">
                            </div>
                            <div class="col-3">

                                <lable style="font-family: Sahel;font-weight: bold;color: black" for="7"> جمعه</lable>
                                <input type="checkbox" value="7" name="daysArray[]" id="7">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-default" value="اضافه">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--        @if(request()->id)--}}
    @foreach($classes as $class)
        <div class="modal fade" id="grade-{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">ویرایش کلاس</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('class.update',$class->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body mx-3">
                            <div class="mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email"
                                       class="col-12 text-right text-dark"> <i class="fas fa-graduation-cap"></i>
                                    نام کلاس</label>

                                <input type="text" id="defaultForm-email" name="name" class="form-control validate">
                                @error('name')
                                <div class="alert alert-danger text-right"
                                     style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" name="update" class="btn btn-default" value="ویرایش">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{--    add student to class --}}
    @foreach($classes as $class)
        <div class="modal fade" id="class-{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">اضافه کردن دانش آموز به کلاس</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('add-student')}}" method="post">
                        @csrf
                        <input type="hidden" name="room_id" value="{{$class->id}}">
                        <div class="modal-body mx-3">
                            <div class=" form-group">
                                <label for="inputAddressMD" class=" col-12 text-right"
                                       style="font-family: Sahel;font-weight: bold;color: black">دانش آموز</label>
                                <select class="browser-default custom-select" name="student_id">
                                    <option selected>دانش آموز</option>
                                    @foreach($students as $student)
                                        @foreach($student->users as $user)
                                            <option
                                                value="{{$student->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('student_id')
                                <div class="alert alert-danger text-right"
                                     style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" name="update" class="btn btn-default" value="اضافه کن">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection




