<div class="w-full h-full p-3">
    <form wire:submit.prevent="login" class="h-full flex flex-wrap gap-4 justify-center items-center content-center">
        <h1 class="text-2xl text-center w-full">
            Bienvenido de nuevo!
        </h1>
        <x-errors title="Ups! parece que ocurrió un error" only="credentials-error" />
        <x-input label="Correo" placeholder="Tu correo" wire:model.live="email" />
        <x-password label="Contraseña" wire:model.live="password" description="Debe tener al menos 8 caracteres" />
        <x-checkbox id="remember_me" label="Recordarme" wire:model="rememeberMe" class="w-full" />
        <div class="w-full flex justify-center">
            <x-button amber label="Iniciar sesión" type="submit"
                class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950 mx-auto" />
        </div>
    </form>
</div>
