<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:20|alpha',
            'last_name' => 'required|max:20|alpha',
            'password' => 'required|min:6|confirmed|max:25',
            'email' => 'required',
            'username' => 'required',
            'is_active' => 'nullable',
            'code' => 'required|max:10',
            'phone_number' => 'required|max:11',
        ];
    }

    public function messages()
    {


        return [
            'first_name.required' => 'نام معلم را وارد کنید',
            'first_name.alpha' => 'فقط از حروف الفبا استفاده کنید ',
            'last_name.required' => 'نام خانوادگی معلم را وارد کنید',
            'last_name.alpha' => 'فقط از حروف الفبا استفاده کنید',
            'password.required' => 'رمز عبور  معلم را وارد کنید',
            'password.confirmed' => 'رمز عبور با تکرار رمز عبور مطابقت ندارد ',
            'email.required' => 'ایمیل معلم را وارد کنید',
            'username.required' => 'نام کاربری معلم را وارد کنید',
            'code.max' => 'کد ملی باید ۱۰ رقم باشد.',
            'code.required' => 'کد ملی را وارد کنید.',
            'phone_number.required' => 'شماره موبایل را وارد کنید.',
            'phone_number.max' => 'شماره موبایل ۱۱ رقم باید باشد.',
            'password.max' => 'رمز عبور کمتر از ۲۵ حرف باید باشد.'

        ];
    }

}
