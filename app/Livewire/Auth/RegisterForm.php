<?php

namespace App\Livewire\Auth;

use App\Actions\Auth\CreateNewUser;
use App\Enums\UserTypeRegisterEnum;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterForm extends Component
{
    #[Validate]
    public $name;

    #[Validate]
    public $email;

    #[Validate]
    public $password;
    public $password_confirmation;
    public $terms;
    public $privacy_policy;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'name'                  => ['required', 'lowercase', 'string', 'min:4', 'unique:users',  'regex:/^[a-zA-Z0-9._]+$/'],
            'email'                 => 'required|lowercase|email|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'terms'                 => 'required|accepted',
            'privacy_policy'        => 'required|accepted'
        ];
    }

    /**
     * Custom error messages
     */
    public function messages()
    {
        return [
            'name.required'                  => 'El nombre es requerido.',
            'name.lowercase'                 => 'El nombre debe estar en minúsculas.',
            'name.min'                       => 'El nombre debe tener al menos 4 caracteres.',
            'name.unique'                    => 'El nombre ya está en uso.',
            'name.regex'                     => 'El nombre solo puede contener letras, números, puntos y guiones bajos.',
            'email.required'                 => 'El email es requerido.',
            'email.lowercase'                => 'El email debe estar en minúsculas.',
            'email.email'                    => 'Debe ser un email válido.',
            'email.unique'                   => 'El email ya está en uso.',
            'password.required'              => 'La contraseña es requerida.',
            'password.string'                => 'La contraseña debe ser una cadena de texto.',
            'password.min'                   => 'La contraseña debe tener al menos 8 caracteres.',
            'password_confirmation.required' => 'La contraseña de confirmación es requerido.',
            'password_confirmation.same'     => 'La contraseña de confirmación debe ser igual al password.',
            'terms.required'                 => 'Debes aceptar los términos y condiciones.',
            'terms.accepted'                 => 'Debes aceptar los términos y condiciones.',
            'privacy_policy.required'        => 'Debes aceptar la política de privacidad.',
            'privacy_policy.accepted'        => 'Debes aceptar la política de privacidad.',
        ];
    }


    /**
     * Save the user in the database and send a notification
     */
    public function save()
    {
        $this->validate();
        $input = [
            'name'                  => $this->name,
            'email'                 => $this->email,
            'password'              => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'type_register'         => UserTypeRegisterEnum::FORM->value,
            'terms'                 => $this->terms == 'on',
            'policy'               => $this->privacy_policy == 'on',
        ];

        $user = (new CreateNewUser)->create($input);

        Auth::login($user);

        $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
