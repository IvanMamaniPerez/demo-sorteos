<nav class="block lg:fixed top-0 w-full z-50 bg-white border-gray-200" x-data="">
    <div class="grid grid-cols-7 p-4 pb-0 lg:pb-4">
        <div class="flex gap-2 col-span-4 lg:col-span-2">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <div class="bg-black rounded-lg p-1.5">
                    <img src="/logo.png" class="h-8" alt="Cuy Dorado Logo" />
                </div>
                <span class="hidden md:inline-block self-center text-2xl font-semibold whitespace-nowrap">Cuy
                    Dorado</span>
            </a>
        </div>
        <div
            class="hidden md:flex justify-end md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2 col-span-3 lg:col-span-2 py-2">
            @if (auth()->check())
                {{-- Validar authentication para mostrar los iconos --}}


                <x-button amber label="Crear evento"
                    class="text-slate-950 font-bold border-slate-950 border-2 hover:text-slate-950" />
                <x-mini-button black flat rounded>
                    <x-icon name="shopping-cart" class="w-5 h-5" />
                </x-mini-button>
                <x-mini-button black flat rounded>
                    <x-icon name="bell" class="w-5 h-5" />
                </x-mini-button>

                <x-shared.user-dropdown :user="auth()->user()" />
            @else
                <x-button amber label="Registrarme" x-on:click="$openModal('registerFormModal')"
                    class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />
                <x-button flat black label="Iniciar sesión" class="underline font-bold" />
            @endif
        </div>

        <div
            class="flex justify-end md:hidden md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2 col-span-3 lg:col-span-2">
            <x-button amber label="Iniciar sesión"
                class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />

        </div>
        <div class="items-center justify-center order-3 w-full lg:flex lg:w-auto lg:order-1 col-span-7 lg:col-span-3">
            <ul
                class="flex flex-row justify-around lg:justify-center font-medium p-2 m-0 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse border-0 bg-white ">
                <li>
                    <a href="#"
                        class="block py-2 px-3 p-0 text-slate-950 font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 flex gap-1">
                        <x-icon name="calendar-days" class="w-5 h-5" />
                        Eventos
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 p-0 text-slate-950 font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 flex gap-1">
                        <x-icon name="trophy" class="w-5 h-5" />
                        Ganadores</a>
                </li>
                <li>
                    <a href="#"
                        class="block lg:hidden py-2 px-3 p-0 text-slate-950 font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 flex gap-1">
                        <x-icon name="star" solid class="w-5 h-5 text-amber-500" />
                        Aseguradas</a>
                </li>
            </ul>
        </div>
    </div>
    <x-modal-card persistent align="center" name="registerFormModal">

        <h1 class="text-2xl text-center">
            Bienvenido a Cuy Dorado
        </h1>

        <livewire:auth.register-form>
    </x-modal-card>
</nav>
