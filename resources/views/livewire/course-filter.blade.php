<div>
    <x-container class="mt-12">
        <div class="grid grid-cols-4 gap-6">
            <aside class="col-span-1">
                <div class="mb-4">
                    <p class="text-lg font-semibold">
                        Order by:
                    </p>
                    <select
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="" disabled selected>Select</option>
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-lg font-semibold">
                        Categories:
                    </p>
                    <ul class="space-y-1">
                        @foreach ($categories as $category)
                            <li>
                                <label class="inline-flex items-center">
                                    <x-checkbox value="{{ $category->id }}"
                                        class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"></x-checkbox>
                                    <span class="ml-2 text-gray-700">{{ $category->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-4">
                    <p class="text-lg font-semibold">
                        Levels:
                    </p>
                    <ul class="space-y-1">
                        @foreach ($levels as $level)
                            <li>
                                <label class="inline-flex items-center">
                                    <x-checkbox value="{{ $level->id }}"
                                        class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"></x-checkbox>
                                    <span class="ml-2 text-gray-700">{{ $level->name }}</span>
                                </label>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div>
                    <p class="text-lg font-semibold">
                        Price:
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <label class="inline-flex items-center">
                                <x-checkbox value="free"
                                    class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"></x-checkbox>
                                <span class="ml-2 text-gray-700">Free</span>
                            </label>
                        </li>
                        <li>
                            <label class="inline-flex items-center">
                                <x-checkbox value="paid"
                                    class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"></x-checkbox>
                                <span class="ml-2 text-gray-700">Paid</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="col-span-3">
                <div class="mb-12">
                    <x-input class="w-full" placeholder="Search Course"></x-input>
                </div>
                <ul class="space-y-4">
                    @forelse ($courses as $course)
                        <li>
                            <a href="{{ route('courses.show', $course->id) }}" class="flex w-full">
                                <figure>
                                    <img src="{{ $course->image }}" alt="{{ $course->title }}"
                                        class="w-full h-48 object-cover rounded-lg shadow-md mb-4">
                                </figure>
                                <div class="flex-1 ml-4">
                                    <h3 class="text-lg mb-1">{{ $course->title }}</h3>
                                    <p class="text-sm text-gray-600">
                                        {{ $course->summary }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-2">
                                        <span class="font-semibold">Category:</span> {{ $course->category->name }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <span class="font-semibold">Level:</span> {{ $course->level->name }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <span class="font-semibold">Price:</span>
                                        @if ($course->price->value == 0)
                                            Free
                                        @else
                                            ${{ number_format($course->price, 2) }}
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li>No courses found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </x-container>
</div>
