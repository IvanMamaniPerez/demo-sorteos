<div class="relative ml-3" x-data="{
    open: false,
    toggle() { this.open = !this.open }
}">
    <div>
        <button type="button" x-on:click="toggle()"
            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
        </button>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <!-- Active: "bg-gray-100", Not Active: "" -->
        <div class="divide-y divide-gray-800 block px-4 py-2 text-sm text-gray-700">
            {{ $user->name }}
        </div>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
            id="user-menu-item-0">Your Profile</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
            id="user-menu-item-1">Settings</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
            id="user-menu-item-2">Sign out</a>
        {{-- Agregar opcion de logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                id="user-menu-item-2"
                onclick="event.preventDefault();
                this.closest('form').submit();">Sign out</a>
        </form>

    </div>
</div>
