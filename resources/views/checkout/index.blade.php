<x-app-layout>
    <x-container class="mt-12">
        <div class="grid lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <ul class="space-y-4">
                        @foreach ($courses as $course)
                            <li class="flex">
                                <figure class="w-40 shrink-0">
                                    <img src="{{ $course->image }}" alt=""
                                        class="w-full aspect-video object-cover object-center">
                                </figure>
                                <div class="ml-4 flex-1 overflow-hidden">
                                    <h2 class="truncate text-lg font-semibold">
                                        <a href="">
                                            {{ $course->title }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-500">
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">{{ $course->level->name }}</span>
                                    </p>
                                    <p>
                                        {{ number_format($course->price->price, 2) }} USD
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl text-center font-semibold mb-4">Order Summary</h2>
                    <div class="space-y-2 flex justify-between items-center">
                        <p class="text-2xl">Total:</p>
                        <p class="text-lg font-semibold">
                            @foreach ($courses as $course)
                                {{ number_format($course->price->price, 2) }} USD
                            @endforeach
                        </p>
                    </div>
                    <div class="mt-4">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
    @push('js')
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"
            data-sdk-integration-source="developer-studio"></script>
        <script>
            paypal.Buttons({
                createOrder() {
                    return axios.post('{{ route('checkout.createPaypalOrder') }}')
                        .then(response => {
                            return response.data.id;
                        })
                        .catch(error => {
                            console.error('Error creating PayPal order:', error);
                            throw new Error('Could not create PayPal order');
                        });
                },
                onApprove(data) {

                }
            }).render('#paypal-button-container');
        </script>
    @endpush
</x-app-layout>
