<x-layouts.app title="{{ $record->title ?? null }}">
    <x-wrapper id="people" class="py-4">
        <x-container>
            @if ($record)
                <div class="w-full grid grid-cols-12 gap-8">
                    <div class="w-full col-span-full md:col-span-8 space-y-4">
                        <x-sections.breadcrumb>
                            <x-sections.breadcrumb.item href="{{ route('index') }}"
                                value="{{ Str::ucfirst(__('beranda')) }}" />
                            <x-sections.breadcrumb.icon />
                            <x-sections.breadcrumb.item href="{{ route('people.index') }}"
                                value="{{ Str::ucfirst(__('tim')) }}" />
                        </x-sections.breadcrumb>
                        <h1 class="font-bold text-3xl">
                            {{ $record->name ?? null }}
                        </h1>
                        <h6 class="text-slate-500">
                            {{ $record->position->title ?? null }}
                        </h6>
                        @if ($record->file)
                            <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                                <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('/images/default-img.svg') }}"
                                    alt="image" class="w-full h-full object-contain">
                            </div>
                        @endif
                        <div class="content">
                            {!! $record->description ?? null !!}
                        </div>
                    </div>
                    <div class="w-full col-span-full md:col-span-4 space-y-4">
                        <div class="sticky top-[30%] self-start space-y-8">
                            <div class="space-y-2">
                                <p class="text-slate-500">
                                    {{ Str::ucfirst(__('bagikan')) }}
                                </p>
                                <x-sections.share />
                            </div>
                            <div class="space-y-2">
                                <p class="text-slate-500">
                                    {{ Str::ucfirst(__('ditulis oleh')) }}
                                </p>
                                <div class="flex justify-start items-center">
                                    <a href="" class="h-full inline-flex items-center gap-4">
                                        <img src="{{ $record->user?->profile?->file ? asset('storage/' . $record->user?->profile?->file) : asset('/images/default-user.svg') }}"
                                            alt="image" class="aspect-square w-10 h-10 rounded-full">
                                        <div>
                                            <h1 class="font-bold">
                                                {{ $record->user?->name ?? null }}
                                            </h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h1 class="text-2xl font-semibold">
                                    {{ Str::ucfirst(__('lainnya')) }}
                                </h1>
                                <div class="w-12 h-1 rounded-full bg-sky-500 "></div>
                                @foreach ($other as $item)
                                    <h3 class="line-clamp-1">
                                        <a href="{{ route('people.show', $item->uuid) }}"
                                            title="{{ $item->name ?? null }}" class="hover:underline">
                                            {{ $item->name ?? null }}
                                        </a>
                                    </h3>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <x-sections.error.text />
            @endif
        </x-container>
    </x-wrapper>
</x-layouts.app>
