<x-js-action-section>
    <x-slot name="title">
        {{ __('Delete Team') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete this team.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain.') }}
        </div>

        <div class="mt-5">
            <x-js-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Delete Team') }}
            </x-js-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-js-confirmation-modal wire:model.live="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Delete Team') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-js-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-js-secondary-button>

                <x-js-danger-button class="ms-3" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Delete Team') }}
                </x-js-danger-button>
            </x-slot>
        </x-js-confirmation-modal>
    </x-slot>
</x-js-action-section>
