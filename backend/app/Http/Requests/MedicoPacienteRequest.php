<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MedicoPacienteRequest extends FormRequest
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
            'medico_id' => 'required|exists:medico,id|',
            'paciente_id' => [
                'required',
                'exists:paciente,id',
                Rule::unique('medico_paciente')->where(function ($query) {
                    return $query->where('medico_id', $this->medico_id)
                        ->where('paciente_id', $this->paciente_id);
                })
            ],
        ];
    }

    public function messages()
    {
        return [
            'paciente_id.unique' => 'Paciente já está vinculado a este médico',
            'medico_id.required' => 'O campo medico_id é obrigatório',
            'medico_id.exists' => 'O campo medico_id deve ser um médico válido',
            'paciente_id.required' => 'O campo paciente_id é obrigatório',
            'paciente_id.exists' => 'O campo paciente_id deve ser um paciente válido',
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
