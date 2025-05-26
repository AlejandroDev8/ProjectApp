<div>
    <h1 class="text-2xl font-semibold">
        Promotional Video for Course: <span class="text-indigo-600 uppercase">{{ $course->title }}</span>
    </h1>
    <hr class="mt-2 mb-6">
    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
                <video class="aspect-video w-full object-cover object-center" controls>
                    <source src="{{ Storage::url($course->video_path) }}">
                </video>
            @else
                <figure>
                    <img class="aspect-video w-full object-cover object-center" src="{{ $course->image }}"
                        alt="Course: {{ $course->title }}">
                </figure>
            @endif
        </div>
        <div class="col-span-1">
            <form wire:submit="save">
                <x-validation-errors class="mb-4" />
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptate ad assumenda. Nesciunt
                    aspernatur eum, praesentium voluptate dolores voluptates deleniti doloremque dolorum eaque porro
                    fuga
                    mollitia tempora reiciendis, quod consequuntur?
                </p>
                <x-progress-indicators wire:model="video" />
                <div class="flex justify-end mt-4">
                    <x-button wire:click="save">
                        Save Promotional Video
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
