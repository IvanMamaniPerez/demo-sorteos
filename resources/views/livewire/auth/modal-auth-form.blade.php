<div>
    <x-modal-card persistent align="center" name="registerFormModal" width="3xl" hide-close="true">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="order-1 lg:order-0 p-5 ">
                <livewire:dynamic-component :is="$current" :key="$current">
            </div>
            <div class="flex items-center align-center order-0 lg:order-1">
                <div class="flex flex-col w-full px-7 gap-4 items-center justify-center">

                    <h1 class="text-xl">Bienvenido!</h1>
                    <img src="/images/welcome.webp" alt class="w-full rounded-md" />

                    <h2 class="text-lg text-center">Continua con </h2>

                    <x-button white class="p-4 w-full ring-1 ring-slate-500">
                        <img class="h-5 w-5" src="/icons/google.svg" alt="Logo google" /> Inicia sesión con Google
                    </x-button>

                    <x-button white class="p-4 w-full ring-1 ring-slate-500">
                        <img class="h-5 w-5 !text-blue-500" src="/icons/facebook.svg" alt="Logo google" /> Inicia sesión
                        con
                        Facebook
                    </x-button>
                    <div class="mt-5">
                        @if ($current === 'auth.register-form')
                            <p class="w-full text-center">Ya tienes una cuenta?
                                <button class="text-blue-500 font-bold" wire:click='showLoginForm'> Inicia
                                    sesión</button>
                            </p>
                        @endif
                        @if ($current === 'auth.login-form')
                        <p class="w-full text-center">Aun no tienes una cuenta?
                            <button class="text-blue-500 font-bold" wire:click='showRegisterForm'> Registrarme</button>
                        </p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </x-modal-card>
</div>
