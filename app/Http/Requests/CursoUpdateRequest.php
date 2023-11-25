<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoUpdateRequest extends FormRequest
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
          'curso' => ['required','string'],
        ];
    }
    public function messages(){
      return [
        'curso.required' => "O campo curso precisa estar preenchido",
        'curso.max' => "O campo deve ter no máximo 30 caracteres"
      ];
    }
}
