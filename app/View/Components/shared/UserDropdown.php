<?php

namespace App\View\Components\shared;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class UserDropdown extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public User $user) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.shared.user-dropdown');
    }
}
