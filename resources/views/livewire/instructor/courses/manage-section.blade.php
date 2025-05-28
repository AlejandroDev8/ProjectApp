<div>
    <form wire:submit.prevent="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label for="sections" :value="__('New Section')" />
            <x-input id="sections" class="w-full mt-4" placeholder="Enter a new section" wire:model="title" />
            <x-input-error for="title" class="mt-2" />
            <div class="flex justify-end">
                <x-button class="mt-4">
                    {{ __('Add Section') }}
                </x-button>
            </div>
        </div>
    </form>
</div>
