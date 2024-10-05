<?php

namespace App\View\Components\shared\layouts;

use App\Enums\ContainerComponentEnum;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserLayout extends Component
{

    /**
     * Create a new component instance.
     * @param ContainerComponentEnum $componentContainer
     */
    public function __construct(public ContainerComponentEnum $componentContainer) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.layouts.user-layout');
    }
}
