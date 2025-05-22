<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course: ' . $course->title) }}
        </h2>
    </x-slot>
    <x-container class="py-8">
        <div class="grid lg:grid-cols-5 grid-cols-1 gap-6">
            <aside class="col-span-1">
                <h1 class="font-semibold text-xl mb-4">
                    Course Edition
                </h1>
                <nav>
                    <ul>
                        <li class="border-l-4 border-indigo-400 pl-3">
                            <a href="{{ route('instructor.courses.edit', $course) }}"
                                class="text-gray-600 hover:text-gray-900 font-semibold">
                                Course Information
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <div class="lg:col-span-4 grid-cols-1">
                <div class="card">
                    asd
                </div>
            </div>
        </div>
    </x-container>
</x-instructor-layout>
