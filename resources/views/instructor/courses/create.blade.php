<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Course
        </h2>
    </x-slot>

    <x-container class="mt-12" width="4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('instructor.courses.store') }}" method="POST">
                @csrf
                <h2 class="text-2xl uppercase text-center mb-4">
                    Complete the form below to create a new course.
                </h2>
                <x-validation-errors class="mb-4" />
                <div class="mb-4">
                    <x-label for="title" class="text-lg mb-2" :value="__('Course Title')" />
                    <x-input id="title" type="text" name="title" class="w-full" placeholder="Course Title"
                        value="{{ old('title') }}" oninput="string_to_slug(this.value, '#slug')" />
                </div>
                <div class="mb-4">
                    <x-label for="slug" class="text-lg mb-2" :value="__('Course Slug')" />
                    <x-input id="slug" type="text" name="slug" class="w-full" placeholder="Course Slug"
                        value="{{ old('slug') }}" />
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <x-label for="category" class="text-lg mb-2" :value="__('Category')" />
                        <select id="category" name="category_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-label for="level" class="text-lg mb-2" :value="__('Level')" />
                        <select name="level_id" id="level"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @selected(old('level_id') == $level->id)>{{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-label for="price" class="text-lg mb-2" :value="__('Price')" />
                        <select name="price_id" id="price"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Price</option>
                            @foreach ($prices as $price)
                                <option value="{{ $price->id }}" @selected(old('price_id') == $price->id)>
                                    @if ($price->price == 0)
                                        Free
                                    @else
                                        {{ $price->price }} US$ (level {{ $loop->index }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button class="mt-4">
                        {{ __('Create Course') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-container>
</x-instructor-layout>
