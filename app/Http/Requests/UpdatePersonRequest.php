<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Pegamos o ID do objeto Person que está vindo pela rota
        $personId = $this->route('person')->id;

        return [
            'name'  => 'sometimes|string|max:255',
            'age'   => 'sometimes|integer|min:0|max:100',
            'email' => [
                'sometimes',
                'email',
                // Valida se é único, mas ignora o registro que estamos editando
                Rule::unique('people')->ignore($personId),
            ],
        ];
    }
}
