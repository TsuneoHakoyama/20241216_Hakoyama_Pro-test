<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'csv_file' => ['required', 'file', 'mimes:csv,txt', 'max:1024'],
            'image_file[]' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'csv_file.required' => 'csvファイルは必須です',
            'csv_file.mimes' => 'csv形式でアップロードしてください',
            'csv_file.max' => 'ファイルサイズは1Mb以内にしてください',
            'image_file.required' => '画像ファイルは必須です',
            'image_file.mimes' => 'jpg. jpeg, pngのいずれかの形式でアップロードしてください',
            'image_file.max' => 'ファイルサイズは2Mb以内にしてください',
        ];
    }

}
