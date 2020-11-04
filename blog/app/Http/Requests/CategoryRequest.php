<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
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
             'name'            => 'required',
             'description'     => 'required|description|unique:categories',
             'image'           => 'required|image|max:1000',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El campo ":attribute" es obligatorio.',
            'description.required'    => 'El campo "Correo Electrónico" es obligatorio.'
        ];
    }

    public function attributes() {
        return [
            'name' => 'Nombre Completo'
        ];
    }
