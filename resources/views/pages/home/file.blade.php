<x-wrapper id="file" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="file" />
            <x-sections.header.hr />
        </x-sections.header>
        @if ($file->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                @foreach ($file as $item)
                    <div
                        class="flex items-center  bg-white overflow-hidden shadow rounded-xl hover:shadow-md transition duration-300 ease-in-out">
                        <div
                            class="aspect-3/4 w-36 flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                            @if ($item->file)
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                    alt="image" class="w-full h-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-12 text-sky-950">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            @endif
                        </div>
                        <div class="space-y-2 p-4">
                            <h3 class="text-slate-400 text-sm line-clamp-1">
                                {{ $item->created_at ? $item->formatDayDate($item->published_at) : null }}
                            </h3>
                            <h1 class="line-clamp-2">
                                {{ $item->title ?? null }}
                            </h1>
                            <div class="flex justify-start">
                                <a wire:navigate href="{{ $item->slug ? route('file.show', $item->slug) : null }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-xl bg-white hover:bg-sky-950 hover:text-white line-clamp-1 transition duration-300 ease-in-out">
                                    {{ Str::title(__('selengkapnya')) }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <x-sections.footer>
                <x-sections.footer.link href="{{ route('file.index') }}" />
            </x-sections.footer>
        @else
            <x-sections.error.text />
        @endif
    </x-container>
</x-wrapper>
