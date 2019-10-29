<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
            'is_active' => 'nullable|boolean',
            'code' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages()
    {


        return [
            'first_name.required' => 'نام خود را وارد کنید',
            'first_name.alpha' => 'فقط از حروف الفبا استفاده کنید ',
            'last_name.required' => 'نام خانوادگی خود را وارد کنید',
            'last_name.alpha' => 'فقط از حروف الفبا استفاده کنید',
            'password.required' => 'رمز عبور  خود را وارد کنید',
            'password.confirmed' => 'رمز عبور با تکرار رمز عبور مطابقت ندارد ',
            'email.required' => 'ایمیل خود را وارد کنید',
            'username.required' => 'نام کاربری خود را وارد کنید',
            'phone_number.required' => 'شماره خود را وارد کنید',
            'code.required' => 'شماره ملی خود را وارد کنید',

        ];
    }
}
