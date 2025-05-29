<x-app-layout>
    <figure class="mb-20">
        <img src="{{ asset('img/cover.jpg') }}" alt="Cover Image"
            class="w-full h-auto md:aspect-[3/1] aspect-square object-cover object-center">
    </figure>
    <section class="mb-24">
        <x-container>
            <h1 class="text-2xl uppercase font-semibold text-center mb-8">
                Welcome to the Laravel Starter
            </h1>
            <ul class="grid grid-cols-4 gap-6">
                <li>
                    <a href="">
                        <img src="https://codersfree.com/img/servicios/cursos.jpeg" alt="Courses Image"
                            class="aspect-video object-center obeject-cover rounded-lg">
                    </a>
                    <h1 class="text-xl text-center font-semibold mb-2 mt-2">
                        <a href="">
                            Courses Online
                        </a>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id corporis porro placeat
                        labore delectus repudiandae facilis similique. Distinctio quisquam ipsa quos illum ex dicta
                        rerum saepe expedita fugiat quibusdam?
                    </p>
                </li>
                <li>
                    <a href="">
                        <img src="https://codersfree.com/img/servicios/desarrollo.jpeg" alt="Courses Image"
                            class="aspect-video object-center obeject-cover rounded-lg">
                    </a>
                    <h1 class="text-xl text-center font-semibold mb-2 mt-2">
                        <a href="">
                            Web Development
                        </a>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id corporis porro placeat
                        labore delectus repudiandae facilis similique. Distinctio quisquam ipsa quos illum ex dicta
                        rerum saepe expedita fugiat quibusdam?
                    </p>
                </li>
                <li>
                    <a href="">
                        <img src="https://codersfree.com/img/servicios/asesorias.jpg" alt="Courses Image"
                            class="aspect-video object-center obeject-cover rounded-lg">
                    </a>
                    <h1 class="text-xl text-center font-semibold mb-2 mt-2">
                        <a href="">
                            Online Advisories
                        </a>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id corporis porro placeat
                        labore delectus repudiandae facilis similique. Distinctio quisquam ipsa quos illum ex dicta
                        rerum saepe expedita fugiat quibusdam?
                    </p>
                </li>
                <li>
                    <a href="">
                        <img src="https://codersfree.com/img/servicios/blog.jpeg" alt="Courses Image"
                            class="aspect-video object-center obeject-cover rounded-lg">
                    </a>
                    <h1 class="text-xl text-center font-semibold mb-2 mt-2">
                        <a href="">
                            Blog
                        </a>
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id corporis porro placeat
                        labore delectus repudiandae facilis similique. Distinctio quisquam ipsa quos illum ex dicta
                        rerum saepe expedita fugiat quibusdam?
                    </p>
                </li>
            </ul>
        </x-container>
    </section>
    <section>
        <x-container>
            <h1 class="text-2xl font-semibold text-center uppercase mb-8">
                Our Courses
            </h1>
            <ul class="grid grid-cols-4 gap-6">
                @foreach ($courses as $course)
                    <li>
                        <div class=" bg-white rounded-lg overflow-hidden">
                            <figure>
                                <img src="{{ $course->image }}" alt="{{ $course->title }}"
                                    class="w-full aspect-video object-cover">
                            </figure>
                            <div class="px-6 py-4 pb-5">
                                <h2 class="line-clamp-2 text-lg leading-5 min-h-[42px]">
                                    <a href="">
                                        {{ $course->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-500 text-sm mt-2">
                                    Level: {{ $course->level->name }}
                                </p>

                                <p class="font-semibold mt-2">
                                    @if ($course->price->value == 0)
                                        <span class="text-green-500 font-semibold text-lg">
                                            Free
                                        </span>
                                    @else
                                        <span class="text-gray-500 font-semibold text-lg">
                                            ${{ $course->price->price }} USD
                                        </span>
                                    @endif
                                </p>
                                <a href="">
                                    <button
                                        class="block w-full text-center mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                                        View Course
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-container>
    </section>
</x-app-layout>
