<form wire:submit="save">
    <x-input label="Nombre de usuario" placeholder="username" prefix="@" wire:model.blur="name" />
    <x-input label="Correo" placeholder="Tu correo" wire:model.blur="email" />
    <x-password label="Contraseña" wire:model='password' />
    <x-password label="Confirma tu contraseña" wire:model='passwordConfirmation' />

    <x-button amber label="Registrarme" type="submit"
        class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />

</form>
