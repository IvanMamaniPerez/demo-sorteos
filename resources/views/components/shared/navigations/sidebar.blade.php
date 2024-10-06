<aside class="block fixed bottom-0 lg:top-0 left-0 z-40 lg:h-full w-full lg:w-64 2xl:w-72 lg:pt-24 bg-white"
    aria-label="Sidebar">
    <div class="h-full p-0 lg:px-3 lg:pb-4 overflow-y-auto bg-white">
        <ul class="text-lg font-bold flex justify-around lg:justify-start lg:flex-wrap py-2">
            <li class="w-full flex justify-center lg:block">
                <a href="#" class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="home" />
                    <span class="ms-3 hidden lg:inline-block">Inicio</span>
                </a>
            </li>
            <li class="w-full flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="magnifying-glass" />
                    <span class="ms-3 hidden lg:inline-block">Buscar</span>
                </a>
            </li>
            <li class="w-full flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="chart-pie" />
                    <span class="ms-3 hidden lg:inline-block">Analítica</span>
                </a>
            </li>
            <li class="w-full flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="bell" />
                    <span class="ms-3 hidden lg:inline-block">Notificaciones</span>
                </a>
            </li>
            <li class="w-full hidden md:flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="calendar-days" />
                    <span class="ms-3 hidden lg:inline-block">Mis eventos</span>
                </a>
            </li>
            <li class="w-full hidden md:flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="shopping-bag" />
                    <span class="ms-3 hidden lg:inline-block">Compras</span>
                </a>
            </li>
            <li class="w-full flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="shopping-cart" />
                    <span class="ms-3 hidden lg:inline-block">Carrito de compras</span>
                </a>
            </li>
            <li class="w-full hidden md:flex justify-center lg:block">
                <a href="#"
                    class="flex items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="bookmark" />
                    <span class="ms-3 hidden lg:inline-block">Favoritos</span>
                </a>
            </li>
            <li class="w-full flex md:hidden justify-center lg:block" x-data="{
                openMoreOptions: false,
            }">
                <button x-on:click="openMoreOptions = !openMoreOptions"
                    class="flex lg:hidden items-center p-2 lg:py-3 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <x-icon name="ellipsis-horizontal-circle" />
                    <span class="ms-3 hidden lg:inline-block">Mas...</span>
                </button>
                <div x-show="openMoreOptions" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-56 origin-bottom-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    style="bottom: 100%" role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                    tabindex="-1">
                    <div class="py-1">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="menu-item-0">Account settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="menu-item-1">Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="menu-item-2">License</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
