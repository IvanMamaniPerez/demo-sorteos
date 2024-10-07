<form wire:submit.prevent="save" class="flex flex-wrap gap-4">
    <h1 class="text-2xl text-center w-full">
        Crea una cuenta, es rápido y fácil
    </h1>
    <x-input label="Nombre de usuario" placeholder="username" prefix="@" wire:model.live="name"
        description="El nombre solo puede contener letras, números, puntos y guiones bajos." />
    <x-input label="Correo" placeholder="Tu correo" wire:model.live="email" />
    <x-password label="Contraseña" wire:model.live='password' description="Debe tener al menos 8 caracteres" />
    <x-password label="Confirma tu contraseña" wire:model.live='password_confirmation' />
    <x-checkbox id="terms" wire:model="terms">
        <x-slot name="label">
            Acepto haber leido los <x-link href="{{ route('terms.show') }}" wire:navigate>terminos y condiciones.</x-link>
        </x-slot>
    </x-checkbox>
    <x-checkbox id="privacy_policy" wire:model="privacy_policy">
        <x-slot name="label">
            Acepto haber leido las <x-link href="{{ route('policy.show') }}" wire:navigate>politicas de privacidad.</x-link>
        </x-slot>
    </x-checkbox>
    <div class="w-full flex justify-center">
        <x-button amber label="Registrarme" type="submit"
            class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950 mx-auto" />
    </div>
</form>
