
@extends('layouts.admin')@section('content')
    {{--    <h1>{{$role}}</h1>--}}
    <!-- Extended material form grid -->
    <div class="card-header card-header-tabs  cyan darken-3 wow fadeInLeft">

        <div class="card-title text-right text-white">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> <i
                    class="fas fa-user-plus"></i> اضافه کردن معلم   </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>

    <div class="card-body" dir="rtl">
        <form method="post" action="{{route('teacher.store')}}">
            <!-- Grid row -->
            @csrf
            <div class="form-row">
                <div class="col-md-6 ">
                    <!-- Material input -->

                    <div class=" form-group">
                        <label class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">نام</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                               name="first_name">
                        @error('first_name')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-6 " dir="rtl">
                    <!-- Material input -->
                    <div class="form-group">
                        <label for="input-char-counter" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> نام
                            خانوادگی </label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                               id="input-char-counter" name="last_name"
                        >
                        @error('last_name')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror


                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddressMD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> رمزعبور</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="inputAddressMD" name="password">
                        @error('password')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddressMD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black"> تکرار رمز
                            عبور </label>
                        <input type="password" name="password_confirmation" class="form-control" id="inputAddressMD">

                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddress2MD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">کد ملی </label>

                        <input type="number" class="form-control @error('code') is-invalid @enderror"
                               id="inputAddress2MD" name="code"
                        >
                        @error('code')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <!-- Grid column -->

                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddress2MD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">شماره موبایل </label>

                        <input type="number" class="form-control @error('code') is-invalid @enderror"
                               id="inputAddress2MD" name="phone_number"
                        >
                        @error('phone_number')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="form-group">
                        <label for="inputCityMD" class=" col-12 text-right @error('username') is-invalid @enderror"
                               style="font-family: Sahel;font-weight: bold;color: black">نام کاربری</label>

                        <input type="text" class="form-control" id="inputCityMD" name="username"
                        >
                        @error('username')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class=" form-group">
                        <label for="inputAddress2MD" class=" col-12 text-right"
                               style="font-family: Sahel;font-weight: bold;color: black">ایمیل</label>

                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="inputAddress2MD" name="email"
                        >
                        @error('email')
                        <div class="alert alert-danger text-right"
                             style="font-family: Sahel;font-weight: normal">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            {{--            <input type="submit" class="btn btn-outline-warning"--}}
            {{--                   style="font-family: Sahel;font-weight: bolder;"--}}
            {{--                   value="انصراف">--}}
            <input type="submit" class=" btn btn-6 btn-6f"
                   style="font-family: Sahel;font-weight: bolder; color: white"
                   value="ثبت">
        </form>

    </div>
    <!-- Extended material form grid -->
@endsection
