<div class="space-y-8">
    <x-sections.search />
    @if ($data->isNotEmpty())
        <div class="w-full grid grid-cols-12 gap-4">
            @foreach ($data as $item)
                <div class="w-full col-span-6 md:col-span-3">
                    <div
                        class="relative flex-none aspect-3/4 w-full overflow-hidden rounded-xl shadow snap-center snap-always">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                            alt="image" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-0 pr-4">
                            <div class="bg-slate-500/50 backdrop-blur-xs p-4 rounded-r-xl text-white text-shadow-md">
                                <h3 class="text-xl font-bold">
                                    <a wire:navigate href="{{ route('people.show', $item->uuid) }}"
                                        class="hover:underline">
                                        {{ $item->name ?? null }}
                                    </a>
                                </h3>
                                <p class="text-sm">
                                    {{ $item->position->title ?? null }}
                                </p>
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
