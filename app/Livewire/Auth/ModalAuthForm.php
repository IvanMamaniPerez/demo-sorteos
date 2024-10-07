<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalAuthForm extends Component
{
    public $current = 'auth.register-form';

    protected $forms = [
        'auth.register-form',
        'auth.login-form',
    ];

    #[On('ModalAuthForm.showRegisterForm')]
    public function showRegisterForm()
    {
        $this->current = 'auth.register-form';
    }

    #[On('ModalAuthForm.showLoginForm')]
    public function showLoginForm()
    {
        $this->current = 'auth.login-form';
    }

    public function render()
    {
        return view('livewire.auth.modal-auth-form');
    }
}
