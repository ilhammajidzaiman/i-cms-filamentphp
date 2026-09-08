@if ($service)
    <section class="w-full border-b border-slate-200">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div
                class="md:border-x border-slate-200 space-y-8 p-4 md:p-12 bg-linear-to-b from-sky-100 via-transparent to-transparent">
                <div class="flex gap-8 mt-12">
                    <div class="grow items-start space-y-4 ">
                        <h1 class="text-4xl">
                            {{ 'Artikel' }}
                        </h1>
                        <h3 class="">
                            {{ 'Artikel terkini seputar informasi.' }}
                        </h3>
                    </div>
                    <div class="flex items-end justify-end">
                        <a wire:navigate href="{{ route('article.index') }}"
                            class="inline-flex items-center gap-2  font-medium hover:underline">
                            {{ Str::title('selengkapnya') }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($article as $item)
                        <div
                            class="flex flex-col bg-white overflow-hidden space-y-4 border border-slate-200 hover:shadow-lg p-4">
                            <div class="relative aspect-video overflow-hidden rounded-xl">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                    alt="image" class="bg-slate-200 w-full h-full object-cover">
                                <h3 class="absolute left-0 bottom-4 ">
                                    <a wire:navigate
                                        href="{{ $item->category->slug ? route('category.show', $item->category->slug) : null }}"
                                        class="flex items-center text-sky-500 bg-white px-4 py-1 rounded-r-lg hover:underline ">
                                        <div class="line-clamp-1">
                                            {{ $item->category->title ?? null }}
                                        </div>
                                    </a>
                                </h3>
                            </div>
                            <div class="flex flex-col flex-1 space-y-2">
                                <h1 class="line-clamp-3">
                                    <a wire:navigate
                                        href="{{ $item->slug ? route('article.show', $item->slug) : null }}"
                                        class="hover:underline">
                                        {{ $item->title ?? null }}
                                    </a>
                                </h1>
                                <h6 class="text-slate-500 text-sm mt-auto">
                                    {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
