<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course: ' . $course->title) }}
        </h2>
    </x-slot>
    <x-container class="py-8">
        <x-instructor.course-sidebar :course="$course">
            <form action="{{ route('instructor.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="text-2xl font-semibold">
                    Course Information
                </p>
                <hr class="mt-2 mb-2">
                <x-validation-errors class="mb-4" />
                <div class="mb-4">
                    <x-label for="title" :value="__('Course Title')" />
                    <x-input id="title" class="block mt-4 w-full" type="text" name="title"
                        value="{{ old('title', $course->title) }}" placeholder="Course Title"
                        oninput="string_to_slug(this.value, '#slug')" />
                </div>
                @empty($course->published_at)
                    <div class="mb-4">
                        <x-label for="slug" :value="__('Course Slug')" />
                        <x-input id="slug" class="block mt-4 w-full" type="text" name="slug"
                            value="{{ old('slug', $course->title) }}" placeholder="Course Slug" />
                    </div>
                @endempty
                <div class="mb-4 ckeditor">
                    <x-label for="summary" :value="__('Course Summary')" />
                    <textarea id="summary" class="block mt-4 w-full" name="summary" rows="5" placeholder="Course Summary">{{ old('summary', $course->summary) }}</textarea>
                </div>
                <div class="mb-4">
                    <x-label for="description" :value="__('Course Description')" />
                    <textarea id="editor" class="block mt-4 w-full" name="description" rows="5" placeholder="Course Description">{{ old('description', $course->description) }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="mb-4">
                        <x-label for="category" :value="__('Category')" />
                        <select id="category" name="category_id"
                            class="block mt-4 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $course->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-label for="level" :value="__('Level')" />
                        <select name="level_id" id="level"
                            class="block mt-4 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @selected(old('level_id', $course->level_id) == $level->id)>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-label for="price" :value="__('Price')" />
                        <select name="price_id" id="price"
                            class="block mt-4 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Price</option>
                            @foreach ($prices as $price)
                                <option value="{{ $price->id }}" @selected(old('price_id', $course->price_id) == $price->id)>
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
                <div>
                    <p class="text-2xl font-semibold mt-4 mb-6">
                        Course Image
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <figure>
                            <img src="{{ $course->image }}" alt="Course Image"
                                class="w-full aspect-video object-cover object-center" id="course-image">
                        </figure>
                        <div>
                            <p class="text-gray-500 mb-2">
                                Upload a new image for the course. The recommended size is 800x450 pixels.
                                <br>
                                <span class="text-red-500">
                                    Note: If you don't upload a new image, the current one will be used.
                                </span>
                            </p>
                            <label>
                                <span class="btn btn-blue md:hidden cursor-pointer">
                                    <i class="fas fa-upload"></i>
                                    Upload Image
                                </span>
                                <input type="file" name="image" class="hidden md:block" accept="image/*"
                                    onchange="imagePreview(event, '#course-image')">
                            </label>
                            <div class="flex md:justify-end mt-4">
                                <x-button class="mt-4">
                                    {{ __('Save Changes') }}
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-instructor.course-sidebar>
    </x-container>
    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#editor')).cath(error => {
                console.log(error)
            });
        </script>
    @endpush
</x-instructor-layout>
