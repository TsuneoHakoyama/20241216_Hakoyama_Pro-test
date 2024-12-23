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
            'csv_file' => ['required', 'file', 'mimes:csv,txt'],
            'image_files' => ['required', 'array'],
            'image_files.*' => ['required', 'file', 'mimes:jpeg,png'],
        ];
    }

    public function messages()
    {
        return [
            'csv_file.required' => 'csvファイルは必須です',
            'csv_file.mimes' => 'csv形式でアップロードしてください',
            'image_files.required' => '画像ファイルは必須です',
            'image_files.*.mimes' => 'jpeg, pngのいずれかの形式でアップロードしてください',
        ];
    }

}
