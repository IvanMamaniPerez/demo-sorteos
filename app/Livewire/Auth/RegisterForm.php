<?php

namespace App\Livewire\Auth;

use App\Actions\Auth\CreateNewUser;
use App\Enums\UserTypeRegisterEnum;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class RegisterForm extends Component
{
    use WireUiActions;

    #[Validate]
    public $name;

    #[Validate]
    public $email;

    public $password;
    public $password_confirmation;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'name'                  => ['required','lowercase','string','min:4','unique:users',  'regex:/^[a-zA-Z0-9._]+$/'],
            'email'                 => 'required|lowercase|email|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8'
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
            'password_confirmation.min'      => 'La contraseña de confirmación debe tener al menos 8 caracteres.'
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
            'terms'                 => true
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
