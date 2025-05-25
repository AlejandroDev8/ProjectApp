<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course: ' . $course->title) }}
        </h2>
    </x-slot>
    <x-container class="py-8">
        <x-instructor.course-sidebar :course="$course">
            <form action="{{ route('instructor.courses.video', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="text-2xl font-semibold">
                    Promotional Video
                </p>
                <hr class="mt-2 mb-2">
                <x-validation-errors class="mb-4" />
                <div class="mb-4">
                    <x-label for="video" :value="__('Video URL')" />
                    <x-input id="video" class="block mt-4 w-full" type="text" name="video"
                        value="{{ old('video', $course->video) }}" placeholder="Video URL" />
                </div>
                <div class="mb-4">
                    <x-button>
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-instructor.course-sidebar>
    </x-container>

</x-instructor-layout>
