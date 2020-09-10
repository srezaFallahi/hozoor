@extends('layouts.admin')

@section('content')
    <div class="card-header card-header-tabs deep-purple wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> مقطع  <i
                    class="fas fa-user-plus"></i> </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body row" dir="rtl">

        <div class="container table-responsive col-9" dir="rtl">
            <table id="example"  class="table  text-center">
                <thead>
                <tr>
                    <th style="font-family: Sahel;font-weight: bolder">ردیف</th>
                    <th style="font-family: Sahel;font-weight: bolder">نام مقطع</th>
                    <th style="font-family: Sahel;font-weight: bolder"> کلاس ها</th>
                    <th style="font-family: Sahel;font-weight: bolder">ویرایش</th>
                    <th style="font-family: Sahel;font-weight: bolder">حذف</th>
                    <th style="font-family: Sahel;font-weight: bolder">نمودار</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grades as $grade)
                    <tr>

                        <td style="font-family:Sahel;;font-weight: normal">{{$num++}}</td>
                        <td style="font-family: Sahel;font-weight: normal">{{$grade->name}}</td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('grade-class')}}" method="post">
                                @csrf
                                <input type="hidden" name="grade_id" value="{{$grade->id}}">
                                <input class="btn btn-primary btn-rounded mb-4 " type="submit" value="کلاس ها">

                            </form>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">

                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-default btn-rounded mb-4"
                                        data-toggle="modal"
                                        data-target="#grade-{{$grade->id}}">
                                    ویرایش
                                </button>
                            </div>
                        </td>
                        <td style="font-family: Sahel;font-weight: normal">
                            <form action="{{route('grade.destroy',$grade->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-5 btn-5a icon-remove  color-2 text-white form-control col-1">
                                    <span>حذف</span></button>
                            </form>
                        </td>
                        <td><a href="{{route('gradeChart',$grade->id)}}" class="btn btn-info">نمودار</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="align-self-center pagination pg-blue ">
        {{$grades->links()}}
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
                    <h4 class="modal-title w-100 font-weight-bold">اضافه کردن مقطع</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('grade.store')}}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"
                                   class="col-12 text-right text-dark"> <i class="fas fa-graduation-cap"></i>
                                نام مقطع</label>

                            <input type="text" id="defaultForm-email" name="name" class="form-control validate">
                            @error('name')
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
    @foreach($grades as $grade)
        <div class="modal fade" id="grade-{{$grade->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">ویرایش مقطع</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('grade.update',$grade->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body mx-3">
                            <div class="mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email"
                                       class="col-12 text-right text-dark"> <i class="fas fa-graduation-cap"></i>
                                    نام مقطع</label>

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
@endsection
