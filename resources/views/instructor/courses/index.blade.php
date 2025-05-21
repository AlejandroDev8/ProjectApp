<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Courses
        </h2>
    </x-slot>
    <x-container class="mt-12">
        <div class="md:flex md:justify-end items-center mb-4">
            <a href="{{ route('instructor.courses.create') }}" class="btn btn-blue block text-center md:w-auto">Create
                Course</a>
        </div>
    </x-container>
</x-instructor-layout>
