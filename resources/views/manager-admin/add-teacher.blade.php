@extends('layouts.admin')
@section('header')
    <p class="float-right text-dark">معلمین</p>
@endsection

@section('content')
    <!-- Extended material form grid -->
    <div class="card-header card-header-tabs  info-color-dark wow fadeInLeft">

        <div class="card-title text-right text-light">
            <span style="font-family: Sahel;font-size: 20px; font-weight: normal"> تعریف معلم جدید <i
                    class="fas fa-user-plus"></i> </span>

            <div class="clearfix d-md-none"></div>

        </div>
    </div>
    <div class="card-body">
        <form>
            <!-- Grid row -->
            <div class="form-row ">
                <!-- Grid column -->
                <div class="col-md-6 " dir="rtl">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <input type="text" class="form-control" id="input-char-counter" name="last_name">
                        <label for="input-char-counter" style="font-family: Sahel;font-weight: bold"> نام
                            خانوادگی </label>

                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-6 md-">
                    <!-- Material input -->

                    <div class="md-form form-group ">
                        <input type="text" class="form-control " id="inputName" name="first_name">

                        <label for="inputName" class="position-absolute"
                               style="font-family: Sahel;font-weight: bold">نام</label>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <input type="password" class="form-control" id="inputAddressMD" name="password">
                        <label for="inputAddressMD" style="font-family: Sahel;font-weight: bold"> رمزعبور</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <input type="password" class="form-control" id="inputAddressMD">
                        <label for="inputAddressMD" style="font-family: Sahel;font-weight: bold"> تکرار رمز
                            عبور </label>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <input type="email" class="form-control" id="inputAddress2MD" name="email">
                        <label for="inputAddress2MD" style="font-family: Sahel;font-weight: bold">ایمیل</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <input type="text" class="form-control" id="inputCityMD" name="username">
                        <label for="inputCityMD" style="font-family: Sahel;font-weight: bold">نام کاربری</label>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <div class="col-12 form-group">
                <input type="submit" class=" btn btn-6 btn-6f"
                       style="font-family: Sahel;font-weight: bolder; color: white"
                       value="ثبت">
            </div>
        </form>
    </div>
    <!-- Extended material form grid -->
@endsection
