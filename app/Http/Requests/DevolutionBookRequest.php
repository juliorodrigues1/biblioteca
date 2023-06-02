<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevolutionBookRequest extends FormRequest
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
            'usuario_id' => 'required|integer',
            'livro_id' => 'required|integer',
            'situação' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.required' => 'O campo usuário é obrigatório',
            'usuario_id.integer' => 'O campo usuário deve ser um número inteiro',
            'livro_id.required' => 'O campo livro é obrigatório',
            'livro_id.integer' => 'O campo livro deve ser um número inteiro',
            'situação.required' => 'O campo situação é obrigatório',
            'situação.integer' => 'O campo situação deve ser um número inteiro',
        ];
    }
}
