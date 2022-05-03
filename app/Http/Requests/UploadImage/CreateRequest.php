<?php

namespace App\Http\Requests\UploadImage;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'image' => ['nullable', 'file', 'max:1999', 'image', 'mimes:jpg,png'],
            'id' => ['required', 'numeric'],
        ];
    }


    public function attributes()
    {
        return [
            'image' => 'Изображение',
        ];
    }
}
