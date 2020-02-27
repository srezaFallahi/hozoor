<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
//            'password' => 'required|min:6|confirmed',
//            'email' => 'required',
//            'username' => 'required',
            'grade_id' => 'required',
            'dad_name' => 'required',
            'code' => 'required',
            'birth_day' => 'required',
            'entry_date' => 'required',
        ];
    }

    public function messages()
    {


        return [
            'first_name.required' => 'نام دانش آموز را وارد کنید',
            'first_name.alpha' => 'فقط از حروف الفبا استفاده کنید ',
            'last_name.required' => 'نام خانوادگی دانش آموز را وارد کنید',
            'last_name.alpha' => 'فقط از حروف الفبا استفاده کنید',
            'dad_name.required' => 'نام پدر را وارد کنید',
            'code.required' => 'کد ملی  را وارد کنید',
            'birth_day.required' => 'تاریخ تولد را وارد کنید',
            'birth_day.date' => 'تاریخ تولد را درست وارد کنید',
            'entry_date.required' => 'تاریخ ورود را وارد کنید',
            'entry_date.date' => 'تاریخ ورود را درست وارد کنید',


        ];
    }
}
