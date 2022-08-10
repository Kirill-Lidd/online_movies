<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'year_release' => 'required|string',
            'image' => 'nullable|file',
            'trailer' => 'nullable|file',
            'film' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'genre_ids' => 'required|array|exists:genres,id',
            'genre_ids.*' => 'exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле не может быть пустым',
            'description.required' => 'Это поле не может быть пустым',
            'year_release.required' => 'Это поле не может быть пустым',
            'category_id.required' => 'Выберите категорию',
            'genre_ids.required' => 'Выберите один или несколко жанров',
        ];
    }
}
