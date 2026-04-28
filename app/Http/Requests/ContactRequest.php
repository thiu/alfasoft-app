<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'name' => [
                'required',
                'min:6',
                'max:200'
            ],
            'contact' => [
                'required',
                Rule::unique('contacts')->ignore($request->id),
                'digits:9'
            ],
            'email' => [
                'email',
                'required',
                Rule::unique('contacts')->ignore($request->id)
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome é obrigatório',
            'name.min' => 'Campo nome precisa ter mais de 5 caracteres',
            'name.max' => 'Campo nome precisa ter no máximo 200 caracteres',
            'contact.required' => 'Campo contato é obrigatório',
            'contact.unique' => 'Contato já cadastrado',
            'contact.digits' => 'Campo contato precisa ter no máximo 9 digitos',
            'email.required' => 'Campo email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Campo email precisa ser um e-mail válido'
        ];
    }

}
