<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pb-0 lg:pb-4 p-4">
        <div class="flex gap-2">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <div class="bg-black rounded-lg p-1.5">
                    <img src="/logo.png" class="h-8" alt="Cuy Dorado Logo" />
                </div>
                <span class="hidden md:inline-block self-center text-2xl font-semibold whitespace-nowrap">Cuy
                    Dorado</span>
            </a>
            <form class="max-w-md mx-auto lg:min-w-56 flex items-center">
                <div class="relative w-full ">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-950" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search"
                        class="bg-slate-200 block w-full p-2 ps-10 text-sm text-gray-900 ring-1 ring-slate-200 border-0 rounded-lg bg-gray-50 focus:ring-slate-400 focus:border-slate-950"
                        placeholder="Buscar eventos, usuarios..." required />
                </div>
            </form>
        </div>
        <div class="hidden md:flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2  ">
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
                <x-button amber label="Registrarme"
                    class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />
                <x-button flat black label="Iniciar sesión" class="underline font-bold" />
            @endif
        </div>

        <div class="flex md:hidden md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2 ">
            <x-button amber label="Iniciar sesión"
                class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />
        </div>

        <div class="items-center justify-between order-3 w-full lg:flex lg:w-auto lg:order-1">
            <ul
                class="flex flex-row justify-center font-medium p-2 m-0 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse border-0 bg-white ">
                <li>
                    <a href="#"
                        class="block py-2 px-3 p-0 font-bold rounded md:bg-transparent text-blue-700 flex gap-1"
                        aria-current="page"> <x-icon name="home" class="w-5 h-5" /> Inicio</a>
                </li>
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
            </ul>
        </div>
    </div>
</nav>
