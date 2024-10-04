<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class SubscribeNewsletter extends Component
{
    public string $email = '';
    public bool $show = true;

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }

    /**
     * Subscribe to newsletter
     */
    public function subscribe()
    {
        dd('en metodo');
        $this->validate();
        //dd('en metodo');
    }
    public function render()
    {
        return view('livewire.shared.subscribe-newsletter');
    }
}
