<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'genero_id.required' => 'O campo gênero é obrigatório',
        ];
    }
}
