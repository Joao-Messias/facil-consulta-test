<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class MedicoRequest extends FormRequest
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
            'especialidade' => 'required|string|max:100',
            'cidade_id' => 'required|integer|exists:cidades,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'especialidade.required' => 'O campo especialidade é obrigatório',
            'especialidade.string' => 'O campo especialidade deve ser uma string',
            'especialidade.max' => 'O campo especialidade deve ter no máximo 100 caracteres',
            'cidade_id.required' => 'O campo cidade_id é obrigatório',
            'cidade_id.integer' => 'O campo cidade_id deve ser um inteiro',
            'cidade_id.exists' => 'O campo cidade_id deve ser um id válido',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator): void
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
