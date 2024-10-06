<form wire:submit.prevent="save" class="flex flex-wrap gap-4">
    <h1 class="text-2xl text-center w-full">
        Bienvenido a Cuy Dorado
    </h1>
    <x-input label="Nombre de usuario" placeholder="username" prefix="@" wire:model.live="name"
        description="El nombre solo puede contener letras, números, puntos y guiones bajos." />
    <x-input label="Correo" placeholder="Tu correo" wire:model.live="email" />
    <x-password label="Contraseña" wire:model.live='password' description="Debe tener al menos 8 caracteres" />
    <x-password label="Confirma tu contraseña" wire:model.live='password_confirmation' />

    <x-button amber label="Registrarme" type="submit"
        class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950 mx-auto" />

</form>
