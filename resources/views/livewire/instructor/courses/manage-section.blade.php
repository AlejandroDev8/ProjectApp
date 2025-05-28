<div>
    <ul class="mb-6 space-y-6">
        @foreach ($sections as $index => $section)
            <li wire:key="section-{{ $section['id'] }}" data-id="{{ $section['id'] }}">
                <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4">
                    <div class="md:flex md:items-center">
                        <h1 class="md:flex-1 truncate">
                            Section {{ $section['position'] }}:
                            <br class="md:hidden" />
                            <span class="font-semibold">{{ $section['title'] }}</span>
                        </h1>
                        <div class="space-x-3 md:shrink-0 md:ml-4">
                            <button>
                                <i class="fas fa-edit text-indigo-600 hover:text-indigo-800"></i>
                            </button>
                            <button>
                                <i class="far fa-trash-alt text-red-600 hover:text-red-800"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
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
