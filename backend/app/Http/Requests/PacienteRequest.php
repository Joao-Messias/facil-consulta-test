<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PacienteRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:20|unique:paciente',
            'celular' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.string' => 'O campo cpf deve ser uma string',
            'cpf.max' => 'O campo cpf deve ter no máximo 20 caracteres',
            'celular.required' => 'O campo celular é obrigatório',
            'celular.string' => 'O campo celular deve ser uma string',
            'celular.max' => 'O campo celular deve ter no máximo 20 caracteres',
            'cpf.unique' => 'O cpf informado já está cadastrado',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
