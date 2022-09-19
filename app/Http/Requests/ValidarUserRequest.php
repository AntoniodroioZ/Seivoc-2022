<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUserRequest extends FormRequest
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
        'alias'         => 'required|min:1|max:30',
        'email'         => 'required|email',
        'password'      => 'required|min:1|max:30',
        'password_confirmation'      => 'required|min:1|max:30',
        'sexo'          => 'required',
        'edad'          => 'required',
        'aviso'         => 'required'
    ];
    }
    public function messages()
    {
       return [
        'alias.required'         => 'El alias esta vacio',
        'email.required'         => 'El correo electronico esta vacio',
        'password.required'      => 'El password esta vacio',
        'password_confirmation.required'      => 'La confirmacion del password esta vacio' ,
        'sexo.required'          => 'EL campo sexo esta vacio',
        'edad.required'          => 'EL campo edad esta vacio',
        'aviso.required'         => 'Leer el aviso de privacidad',
        'profile_photo_path.required' => 'No hay imagen para el usuario'
      ];
    }
    public function attributes()
    {
      return [
        'alias'         => 'alias de usuario',
        'email'         => 'correo electronico',
        'password'      => 'password',
        'password_confirmation'      => 'password_confirmation',
        'sexo'          => 'sexo',
        'edad'          => 'edad',
        'aviso'         => 'aviso',
        'profile_photo_path' => 'Imagen'
      ];
    }
}
