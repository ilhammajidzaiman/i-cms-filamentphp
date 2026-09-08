<section class="w-full border-b border-slate-200">
    <div class ="md:max-w-7xl mx-auto md:px-4">
        <div class="bg-linear-to-l from-sky-100 via-transparent to-transparent">
            <div class="md:border-x border-slate-200 space-y-8 p-4 md:p-12">
                <div class="flex gap-8 mt-12">
                    <div class="grow items-start space-y-4">
                        <h1 class="text-2xl font-bold">
                            <span class="">
                                {{ 'File' }}
                            </span>
                        </h1>
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
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($file as $item)
                        <li
                            class="relative flex flex-col bg-white overflow-hidden space-y-4 border border-slate-200 hover:shadow-lg p-4">
                            <div
                                class="absolute right-4 top-4 text-8xl font-extrabold text-slate-500/10 select-none pointer-events-none">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <div class="flex flex-col flex-1 space-y-2">
                                <h1 class="line-clamp-3">
                                    <a wire:navigate href="{{ $item->slug ? route('file.show', $item->slug) : null }}"
                                        class="hover:underline">
                                        {{ $item->title ?? null }}
                                    </a>
                                </h1>
                                <h6 class="text-slate-500 text-sm mt-auto">
                                    {{ $item->created_at ? $item->formatDayDate($item->created_at) : null }}
                                </h6>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
