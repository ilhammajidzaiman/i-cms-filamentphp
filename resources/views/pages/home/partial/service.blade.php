{{-- @if ($service)
    <section class="w-full border-b border-slate-200">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div class="bg-radial-[at_0%_0%] from-sky-100 via-transparent to-transparent">
                <div class="md:border-x border-slate-200 space-y-8 p-4 md:p-12">
                    <div class="flex gap-8 mt-12">
                        <div class="grow items-start space-y-4">
                            <h1 class="text-4xl">
                                {{ 'Layanan' }}
                            </h1>
                            <h3>
                                {{ 'Layanan yang ada.' }}
                            </h3>
                        </div>
                        <div class="flex items-end justify-end">
                            <a wire:navigate href="{{ route('article.index') }}"
                                class="inline-flex items-center gap-2  font-medium hover:underline">
                                {{ Str::title('selengkapnya') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($service as $item)
                            <div
                                class="flex flex-col justify-between bg-white overflow-hidden border border-slate-200 hover:shadow-lg space-y-8 p-8">
                                <div class="space-y-4 flex-1">
                                    <h1 class="text-xl font-bold">
                                        <a wire:navigate
                                            href="{{ $item->slug ? route('service.show', $item->slug) : null }}"
                                            class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <p class="text-gray-600 line-clamp-6">
                                        {{ $item->description ?? null }}
                                    </p>
                                </div>
                                <div class="aspect-video overflow-hidden rounded-xl">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                        alt="image" class="bg-slate-200 w-full h-full object-cover">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif --}}
@if ($service)
    <section class="w-full border-b border-slate-200">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div class="bg-radial-[at_0%_0%] from-sky-100 via-transparent to-transparent">
                <div class="md:border-x border-b border-slate-200 space-y-8 p-4 md:p-12">
                    <div class="flex gap-8 mt-12">
                        <div class="grow items-start space-y-4">
                            <h1 class="text-4xl">
                                {{ 'Layanan' }}
                            </h1>
                            <h3>
                                {{ 'Layanan yang ada.' }}
                            </h3>
                        </div>
                        <div class="flex items-end justify-end">
                            <a wire:navigate href="{{ route('article.index') }}"
                                class="inline-flex items-center gap-2  font-medium hover:underline">
                                {{ Str::title('selengkapnya') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:border-x border-slate-200 space-y-8 ">
                    <div class="flex flex-col md:flex-row divide-y md:divide-x divide-slate-200 divide-dashed">
                        @foreach ($service as $item)
                            <div class="flex flex-col justify-between overflow-hidden space-y-8 p-4 md:p-12">
                                <div class="space-y-4 flex-1">
                                    <h1 class="text-xl font-bold">
                                        <a wire:navigate
                                            href="{{ $item->slug ? route('service.show', $item->slug) : null }}"
                                            class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <p class="text-gray-600 line-clamp-6">
                                        {{ $item->description ?? null }}
                                    </p>
                                </div>
                                <div class="aspect-video overflow-hidden rounded-xl mt-auto">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                        alt="image" class="bg-slate-200 w-full h-full object-cover">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
