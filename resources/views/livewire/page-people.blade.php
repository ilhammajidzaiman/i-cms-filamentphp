<div class="space-y-8">
    <x-sections.search />
    @if ($data->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            @foreach ($data as $item)
                <div class="flex flex-col md:flex-row p-4 bg-white rounded-xl overflow-hidden shadow gap-4">
                    <div
                        class="aspect-square md:aspect-3/4 w-full md:w-52 flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                            alt="image"
                            class="w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                    </div>
                    <div class="flex-auto flex flex-col justify-center space-y-2">
                        <h3 class="text-lg text-sky-500">
                            {{ $item->position->title ?? null }}
                        </h3>
                        <h1 class="text-2xl font-semibold">
                            <a wire:navigate href="{{ route('people.show', $item->uuid) }}" class="hover:underline">
                                {{ $item->name ?? null }}
                            </a>
                        </h1>
                        <p class="line-clamp-6">
                            {{ $item->description ?? null }}
                        </p>
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
