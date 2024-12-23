<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'time' => ['required'],
            'number' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'time.required' => '時刻を選択してください',
            'number.required' => '人数を選択してください'
        ];
    }
}
