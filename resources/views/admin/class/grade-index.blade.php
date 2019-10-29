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

        <div class="container table-responsive col-9" dir="rtl">
            <table class="table  text-center">
                <thead>
                <tr>
                    <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام کلاس</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام استاد</th>
                    <th style="font-family: Sahel;font-weight: bolder">مقطع</th>
                    <th style="font-family: Sahel;font-weight: bolder">اضافه کردن دانش آموز</th>
                    <th style="font-family: Sahel;font-weight: bolder">اعضا کلاس</th>
                    <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                    <th style="font-family: Sahel;font-weight: bolder">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                    <tr>

                        <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                        <td style="font-family: Sahel;font-weight: normal">{{$class->name}}</td>
                        <td style="font-family: Sahel;font-weight: normal">{{$class->teacher->first_name}} {{$class->teacher->last_name}}</td>
                        <td style="font-family: Sahel;font-weight: normal">{{$class->grade->name}}</td>
                        <td style="font-family: Sahel;font-weight: normal">

                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-primary btn-rounded mb-4"
                                        data-toggle="modal"
                                        data-target="#class-{{$class->id}}">
                                    اضافه کردن عضو
                                </button>
                            </div>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('show-student')}}" method="post">
                                @csrf
                                <input type="hidden" name="room_id" value="{{$class->id}}">
                                <input type="submit" class="btn btn-warning btn-rounded mb-4" value="اعضا کلاس">
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="text-center wow fadeInRight">
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
           data-target="#modalLoginForm45">اضافه</a>
    </div>

@endsection
@section('out-card')
    <div class="modal fade" id="modalLoginForm45" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <div class="col-md-6">
                        <!-- Material input -->
                        <div class=" form-group">
                            <label for="inputAddressMD" class=" col-12 text-right"
                                   style="font-family: Sahel;font-weight: bold;color: black">مقطع</label>
                            <select class="browser-default custom-select" name="grade_id">
                                <option selected>مقطع</option>
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                            </select>
                            @error('grade_id')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- Material input -->
                        <div class=" form-group">
                            <label for="inputAddressMD" class=" col-12 text-right"
                                   style="font-family: Sahel;font-weight: bold;color: black">معلم</label>
                            <select class="browser-default custom-select" name="teacher_id">
                                <option selected>معلم</option>
                                @foreach($teachers as $teacher)
                                    <option
                                        value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                            <div class="alert alert-danger text-right"
                                 style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                            @enderror
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
                                        <option
                                            value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
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

