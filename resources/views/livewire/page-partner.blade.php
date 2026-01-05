<div class="space-y-8">
    <x-sections.search />
    @if ($data->isNotEmpty())
        <div class="w-full grid grid-cols-12 gap-4">
            @foreach ($data as $item)
                <div class="w-full col-span-6 md:col-span-4">
                    <div
                        class="relative flex-none aspect-4/3 w-full bg-white overflow-hidden rounded-xl shadow snap-center snap-always">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                            alt="image" class="w-full h-full object-contain">
                        <div class="absolute bottom-4 left-0 pr-4">
                            <div
                                class="bg-slate-500/50 backdrop-blur-xs px-4 py-2 rounded-r-xl text-white text-shadow-md">
                                <h3 class="text-lg">
                                    <a wire:navigate
                                        href="{{ $item->slug ? route('partner.show', $item->slug) : null }}"
                                        class="hover:underline">
                                        {{ $item->title ?? null }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($more)
            <x-sections.more />
        @endif
    @else
        <x-sections.error.text />
    @endif
</div>
