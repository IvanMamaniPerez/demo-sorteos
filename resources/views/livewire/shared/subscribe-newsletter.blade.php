<div class="fixed bottom-0 start-0 z-50 justify-between w-full p-4 border-b border-gray-300 bg-gray-100 border-t">
    <div class="flex flex-wrap justify-between">
        <h3 class="w-full text-center font-bold mb-1">Te enviaremos los mejores eventos y novedades</h3>
        <div class="flex items-center flex-shrink-0 w-full mx-auto sm:w-auto">
            <form class="flex flex-col items-center w-full md:flex-row">
                <label for="email"
                    class="flex-shrink-0 mb-2 me-auto text-sm text-slate-950 font-bold md:mb-0 md:me-4 md:m-0">
                    Suscribete a nuestro boletín
                </label>
                <input type="email" id="email" placeholder="Ingresa tu correo"
                    class="bg-white border border-gray-300 text-gray-900 md:w-64 mb-2 md:mb-0 md:me-4 text-sm rounded-lg focus:ring-slate-300 focus:border-slate-300 block w-full p-2.5"
                    required />
                <x-button amber label="Suscribirme" wire:click="subscribe"
                    class="!text-slate-950 !font-bold border-slate-950 border-2 hover:text-slate-950" />
            </form>
        </div>
        <div class="flex items-center absolute top-2.5 end-2.5 ">
            <button data-dismiss-target="#newsletter-banner" type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
</div>
