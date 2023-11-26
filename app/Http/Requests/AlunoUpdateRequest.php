<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoUpdateRequest extends FormRequest
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
          'nome' => ['required','string'],
          'descricacao' => ['max:3000'],
          'imagem' => ['image'],
          'curso_id' => ['required'],
          'contratado' => ['nullable'],
        ];
    }
    public function messages(){
      return [
          'nome.required' => "O campo precisa ser informado",
          'descricao.max' => "O campo deve ter no máximo 3000 caracteres",
          'imagem.image' => "A imagem precisa ser dos tipos PNG, JPEG, JPG, etc...",
          'curso_id.required' => "Coloque o curso do aluno!",

      ];
    }
}
