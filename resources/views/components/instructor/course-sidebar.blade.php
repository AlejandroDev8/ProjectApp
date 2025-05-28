@props(['course'])

@php
    $links = [
        [
            'name' => 'Course Information',
            'url' => route('instructor.courses.edit', $course),
            'icon' => 'fa-solid fa-circle-info',
            'active' => request()->routeIs('instructor.courses.edit'),
        ],
        [
            'name' => 'Promotional Video',
            'url' => route('instructor.courses.video', $course),
            'icon' => 'fa-solid fa-video',
            'active' => request()->routeIs('instructor.courses.video'),
        ],
        [
            'name' => 'Course Goals',
            'url' => route('instructor.courses.goals', $course),
            'icon' => 'fa-solid fa-bullseye',
            'active' => request()->routeIs('instructor.courses.goals'),
        ],
        [
            'name' => 'Requirements',
            'url' => route('instructor.courses.requirements', $course),
            'icon' => 'fa-solid fa-list-check',
            'active' => request()->routeIs('instructor.courses.requirements'),
        ],
        [
            'name' => 'Course Sections',
            'url' => route('instructor.courses.curriculum', $course),
            'icon' => 'fa-solid fa-book',
            'active' => request()->routeIs('instructor.courses.curriculum'),
        ],
    ];
@endphp

<div class="grid lg:grid-cols-5 grid-cols-1 gap-6">
    <aside class="col-span-1">
        <h1 class="font-semibold text-xl mb-4">
            Course Edition
        </h1>
        <nav>
            <ul class="space-y-2">
                @foreach ($links as $link)
                    <li class="border-l-4 {{ $link['active'] ? 'border-indigo-400' : 'border-transparent' }} pl-3">
                        @if (isset($link['icon']))
                            <i class="{{ $link['icon'] }} mr-1 text-indigo-600"></i>
                        @endif
                        <a href="{{ $link['url'] }}"
                            class="text-gray-600 hover:text-gray-900 font-semibold">{{ $link['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>
    <div class="lg:col-span-4 grid-cols-1">
        <div class="card">
            {{ $slot }}
        </div>
    </div>
</div>
