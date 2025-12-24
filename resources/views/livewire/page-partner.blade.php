<div class="space-y-8">
    <x-sections.search />
    @if ($data->isNotEmpty())
        @foreach ($data as $item)
            <div class="flex flex-col md:flex-row items-center  bg-white overflow-hidden shadow rounded-xl">
                <div class="aspect-video h-56 flex items-center justify-center overflow-hidden rounded-xl shrink-0 ">
                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                        alt="image" class=" bg-slate-200 w-full h-full object-contain ">
                </div>
                <div class="space-y-2 p-4">
                    <h1 class="text-xl font-bold line-clamp-1">
                        {{ $item->title ?? null }}
                    </h1>
                    <h3 class="line-clamp-3">
                        {{ $item->description ?? null }}
                    </h3>
                    <div class="flex justify-start">
                        <a wire:navigate href="{{ $item->slug ? route('partner.show', $item->slug) : null }}"
                            class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-xl bg-white hover:bg-sky-950 hover:text-white transition line-clamp-1">
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
        @if ($more)
            <x-sections.more />
        @endif
    @else
        <x-sections.error.text />
    @endif
</div>
