<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate]
    public $name;

    #[Validate]
    public $email;

    #[Validate]
    public $password;

    public $rememeberMe = false;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'email'    => 'required|lowercase|email',
            'password' => 'required',
        ];
    }

    /**
     * Custom error messages
     */
    public function messages()
    {
        return [
            'email.required'    => 'El email es requerido.',
            'email.lowercase'   => 'El email debe estar en minúsculas.',
            'email.email'       => 'Debe ser un email válido.',
            'password.required' => 'La contraseña es requerida.',
        ];
    }

    public function login()
    {
        $this->validate();
        $credentials = $this->validate();
        if (Auth::attempt($credentials, $this->rememeberMe)) {
            return redirect()->intended('/');
        }else{
            $this->addError('credentials-error', 'Credenciales incorrectas');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
