<div>
    <ul class="mb-4 space-y-3">
        @foreach ($goals as $index => $goal)
            <li wire:key="goal-{{ $goal['id'] }}"">
                <div class="flex">
                    <x-input wire:model="goals.{{ $index }}.title" class="flex-1 rounded-r-none" />
                    <div class="border border-l-0 border-gray-300">
                        <div class="flex items-center h-full">
                            <button class="px-2 hover:text-red-600" onclick="destroyGoal({{ $goal['id'] }}) ">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        @if (count($goals) > 0)
            <x-button wire:click="update">
                {{ __('Update') }}
            </x-button>
        @else
            <span class="text-gray-500">{{ __('No goals yet. Please add one.') }}</span>
        @endif
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

    @push('js')
        <script>
            destroyGoal = (id) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });

                        @this.call('destroy', id);
                    }
                });
            }
        </script>
    @endpush
</div>
