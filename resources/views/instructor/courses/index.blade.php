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
        <ul>
            @forelse ($courses as $course)
                <li class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <a href="{{ route('instructor.courses.edit', $course) }}" class="md:flex">
                        <figure class="flex-shrink-0">
                            <img src="{{ $course->image }}" alt="Course Image"
                                class="md:w-36 w-full aspect-video md:aspect-square object-cover object-center">
                        </figure>
                        <div class="flex-1">
                            <div class="py-4 px-8">
                                <div class="grid md:grid-cols-9">
                                    <div class="md:col-span-3">
                                        <h1 class="text-lg font-bold text-gray-900">
                                            {{ $course->title }}
                                        </h1>
                                        @switch($course->status->name)
                                            @case('DRAFT')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset">{{ $course->status->name }}</span>
                                            @break

                                            @case('PENDING')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-yellow-600/20 ring-inset">{{ $course->status->name }}</span>
                                            @break

                                            @case('PUBLISHED')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">{{ $course->status->name }}</span>
                                            @break

                                            @default
                                        @endswitch
                                    </div>
                                    <div class="hidden md:block col-span-2">
                                        <p class="text-sm font-bold">
                                            100 USD
                                        </p>
                                        <p class="mb-1 text-sm">
                                            Earnings of the month
                                        </p>
                                        <p class="text-sm font-bold">
                                            1000 USD
                                        </p>
                                        <p class="text-sm">
                                            Total Earnings
                                        </p>
                                    </div>
                                    <div class="hidden md:block col-span2">
                                        <p class="text-sm font-bold">
                                            50
                                        </p>
                                        <p class="mb-1 text-sm">
                                            Students Enrolled
                                        </p>
                                    </div>
                                    <div class="hidden md:block col-span-2">
                                        <div class="flex justify-end">
                                            <p class="mr-3">
                                                5
                                            </p>
                                            <ul class="text-xs space-x-1 flex items-center ml-2 text-yellow-400">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @empty
                    <li class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="py-4 px-8 flex justify-between">
                            <h1 class="text-lg font-bold text-gray-900">
                                No courses available
                            </h1>
                            <p class="text-sm font-bold">
                                Crate a course to get started
                            </p>
                        </div>
                    </li>
                @endforelse
            </ul>
        </x-container>
    </x-instructor-layout>
