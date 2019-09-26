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
            'password' => 'required|min:6|confirmed',
            'email' => 'required',
            'username' => 'required',
            'is_active' => 'nullable|boolean'
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
            'username.required' => 'نام کاربری معلم را وارد کنید'

        ];
    }

}
