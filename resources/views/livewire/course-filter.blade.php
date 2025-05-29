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

            </div>
        </div>
    </x-container>
</div>
