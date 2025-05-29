<x-app-layout>
    <x-container class="mt-12">
        <div class="grid grid-cols-3 gap-12">
            <div class="col-span-2">
                <div>
                    <h1 class="text-3xl font-semibold mb-1">{{ $course->title }}</h1>
                    <p class="mb-4">
                        {{ $course->summary }}
                    </p>
                    <figure>
                        <img src="{{ $course->image }}" alt="{{ $course->title }}"
                            class="w-full aspect-video object-center object-cover">
                    </figure>
                </div>
            </div>
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-4">
                        <p class="font-semibold mb-2 text-2xl text-center">
                            @if ($course->price->value == 0)
                                <span class="text-green-600">Free</span>
                            @else
                                <span class="text-gray-700">
                                    {{ $course->price->value }}
                                </span>
                            @endif
                        </p>
                        <button class="btn btn-blue w-full mb-2 uppercase">
                            Add to Cart
                        </button>
                        <a href="{{ route('cart.index') }}">
                            <button class="btn btn-green w-full uppercase">
                                Buy Now
                            </button>
                        </a>
                    </div>
                    <div>
                        <p class="font-semibold text-lg mb-1">
                            Details about the course.
                        </p>
                        <ul class="space-y-1">
                            <li>
                                <i class="far fa-calendar-alt"></i> Latest update:
                                {{ $course->updated_at->format('M d, Y') }}
                            </li>
                            <li>
                                <i class="far fa-clock"></i> Duration: 12 hours
                            </li>
                            <li>
                                <i class="fas fa-chart-line"></i> Level: <span
                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">{{ $course->level->name }}</span>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
