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
            'grade_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dad_name' => 'required',
            'personal_code' => 'required',
            'birth_day' => 'required|date',
            'entry_date' => 'required|date'
        ];
    }

    public function messages()
    {


        return [
            'first_name.required' => 'نام دانش آموز را وارد کنید',
            'first_name.alpha' => 'فقط از حروف الفبا استفاده کنید ',
            'last_name.required' => 'نام خانوادگی دانش آموز را وارد کنید',
            'last_name.alpha' => 'فقط از حروف الفبا استفاده کنید',

        ];
    }
}
