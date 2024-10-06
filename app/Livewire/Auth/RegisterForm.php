<?php

namespace App\Livewire\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Enums\UserTypeRegisterEnum;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class RegisterForm extends Component
{
    use WireUiActions;
    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;

    public function rules()
    {
        return [
            'name'                 => 'required|string|min:4|unique:users',
            'email'                => 'required|email|unique:users',
            'password'             => 'required|string|min:8',
            'passwordConfirmation' => 'required_with:password|same:password|min:8'
        ];
    }

    /**
     * Save the user in the database and send a notification
     */
    public function save()
    {
        $this->validate();
        $imput = [
            'name'                  => $this->name,
            'email'                 => $this->email,
            'password'              => $this->password,
            'password_confirmation' => $this->passwordConfirmation,
            'type_register'         => UserTypeRegisterEnum::FORM,
        ];

        dd('paso validation');
        (new CreateNewUser())->create($imput);

        $this->notification()->send([
            'icon'        => 'success',
            'title'       => 'Registro exitoso!',
            'description' => "Bienvenido! @$this->name",
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
