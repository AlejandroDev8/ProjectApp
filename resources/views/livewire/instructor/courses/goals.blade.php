<div>
    <ul class="mb-4 space-y-3">
        @foreach ($goals as $index => $goal)
            <li wire:key="goal-{{ $goal['id'] }}"">
                <x-input wire:model="goals.{{ $index }}.title" class="w-full" />
            </li>
        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            {{ __('Update') }}
        </x-button>
    </div>

    <form wire:submit.prevent="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label for="goals" :value="__('New Goal')" />
            <x-input id="goals" class="w-full mt-4" placeholder="Enter a new goal" wire:model="title" />
            <x-input-error for="title" class="mt-2" />
            <div class="flex justify-end">
                <x-button class="mt-4">
                    {{ __('Add Goal') }}
                </x-button>
            </div>
        </div>
    </form>
</div>
