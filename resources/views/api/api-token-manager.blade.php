<div>
    <!-- Generate API Token -->
    <x-js-form-section submit="createApiToken">
        <x-slot name="title">
            {{ __('Create API Token') }}
        </x-slot>

        <x-slot name="description">
            {{ __('API tokens allow third-party services to authenticate with our application on your behalf.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Token Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-js-label for="name" value="{{ __('Token Name') }}" />
                <x-js-input id="name" type="text" class="mt-1 block w-full" wire:model="createApiTokenForm.name" autofocus />
                <x-js-input-error for="name" class="mt-2" />
            </div>

            <!-- Token Permissions -->
            @if (Laravel\Jetstream\Jetstream::hasPermissions())
                <div class="col-span-6">
                    <x-js-label for="permissions" value="{{ __('Permissions') }}" />

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
                            <label class="flex items-center">
                                <x-js-checkbox wire:model="createApiTokenForm.permissions" :value="$permission"/>
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $permission }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="actions">
            <x-js-action-message class="me-3" on="created">
                {{ __('Created.') }}
            </x-js-action-message>

            <x-js-button>
                {{ __('Create') }}
            </x-js-button>
        </x-slot>
    </x-js-form-section>

    @if ($this->user->tokens->isNotEmpty())
        <x-js-section-border />

        <!-- Manage API Tokens -->
        <div class="mt-10 sm:mt-0">
            <x-js-action-section>
                <x-slot name="title">
                    {{ __('Manage API Tokens') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('You may delete any of your existing tokens if they are no longer needed.') }}
                </x-slot>

                <!-- API Token List -->
                <x-slot name="content">
                    <div class="space-y-6">
                        @foreach ($this->user->tokens->sortBy('name') as $token)
                            <div class="flex items-center justify-between">
                                <div class="break-all dark:text-white">
                                    {{ $token->name }}
                                </div>

                                <div class="flex items-center ms-2">
                                    @if ($token->last_used_at)
                                        <div class="text-sm text-gray-400">
                                            {{ __('Last used') }} {{ $token->last_used_at->diffForHumans() }}
                                        </div>
                                    @endif

                                    @if (Laravel\Jetstream\Jetstream::hasPermissions())
                                        <button class="cursor-pointer ms-6 text-sm text-gray-400 underline" wire:click="manageApiTokenPermissions({{ $token->id }})">
                                            {{ __('Permissions') }}
                                        </button>
                                    @endif

                                    <button class="cursor-pointer ms-6 text-sm text-red-500" wire:click="confirmApiTokenDeletion({{ $token->id }})">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-js-action-section>
        </div>
    @endif

    <!-- Token Value Modal -->
    <x-js-dialog-modal wire:model.live="displayingToken">
        <x-slot name="title">
            {{ __('API Token') }}
        </x-slot>

        <x-slot name="content">
            <div>
                {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
            </div>

            <x-js-input x-ref="plaintextToken" type="text" readonly :value="$plainTextToken"
                class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 w-full break-all"
                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            />
        </x-slot>

        <x-slot name="footer">
            <x-js-secondary-button wire:click="$set('displayingToken', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-js-secondary-button>
        </x-slot>
    </x-js-dialog-modal>

    <!-- API Token Permissions Modal -->
    <x-js-dialog-modal wire:model.live="managingApiTokenPermissions">
        <x-slot name="title">
            {{ __('API Token Permissions') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
                    <label class="flex items-center">
                        <x-js-checkbox wire:model="updateApiTokenForm.permissions" :value="$permission"/>
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $permission }}</span>
                    </label>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-js-secondary-button wire:click="$set('managingApiTokenPermissions', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-js-secondary-button>

            <x-js-button class="ms-3" wire:click="updateApiToken" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-js-button>
        </x-slot>
    </x-js-dialog-modal>

    <!-- Delete Token Confirmation Modal -->
    <x-js-confirmation-modal wire:model.live="confirmingApiTokenDeletion">
        <x-slot name="title">
            {{ __('Delete API Token') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this API token?') }}
        </x-slot>

        <x-slot name="footer">
            <x-js-secondary-button wire:click="$toggle('confirmingApiTokenDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-js-secondary-button>

            <x-js-danger-button class="ms-3" wire:click="deleteApiToken" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-js-danger-button>
        </x-slot>
    </x-js-confirmation-modal>
</div>
