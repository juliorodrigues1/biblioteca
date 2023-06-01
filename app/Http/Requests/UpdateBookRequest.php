<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'autor' => 'required|string',
            'situacao' => 'required|int',
            'genero_id'=> 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'autor.required' => 'O campo autor é obrigatório',
            'situacao.required' => 'O campo situação é obrigatório',
            'situacao.int' => 'O campo situação deve ser um inteiro',
            'genero_id.required' => 'O campo genero_id é obrigatório',
            'genero_id.int' => 'O campo genero_id deve ser um inteiro',
        ];
    }
}
