<?php

namespace App\Livewire\Shared;

use Livewire\Component;

class SubscribeNewsletter extends Component
{
    public string $email = '';

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
        $this->validate();
        // Add your logic here
    }
    public function render()
    {
        return view('livewire.shared.subscribe-newsletter');
    }
}
