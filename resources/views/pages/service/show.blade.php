<x-layouts.app title="{{ $record->title ?? null }}">
    <x-wrapper id="service" class="py-4">
        <x-container>
            <div class="w-full grid grid-cols-12 gap-12">
                <div class="w-full col-span-full md:col-span-8 space-y-4">
                    <div class="flex items-center space-x-2 text-slate-500">
                        <a wire:navigate href="{{ route('index') }}"class="whitespace-nowrap hover:underline">
                            {{ Str::ucfirst(__('beranda')) }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a wire:navigate href="{{ route('service.index') }}"class="whitespace-nowrap hover:underline">
                            {{ Str::ucfirst(__('layanan')) }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a wire:navigate href="{{ route('service.index') }}"class=" hover:underline line-clamp-1">
                            {{ $record->title ?? null }}
                        </a>
                    </div>
                    <h1 class="font-bold text-3xl">
                        {{ $record->title ?? null }}
                    </h1>
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
                            <div class="flex justify-center md:justify-start items-center">
                                <a href="" class="h-full inline-flex items-center gap-4">
                                    <img src="{{ $record->user->profile->file ? asset('storage/' . $record->user->profile->file) : asset('/images/default-user.svg') }}"
                                        alt="image" class="aspect-square w-10 h-10 rounded-full">
                                    <div>
                                        <h1 class="font-bold">
                                            {{ $record->user->name ?? null }}
                                        </h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-2xl font-semibold">
                                {{ Str::ucfirst(__('layanan lainnya')) }}
                            </h1>
                            <div class="w-12 h-1 rounded-full bg-sky-500 "></div>
                            @foreach ($other as $item)
                                <h3 class="line-clamp-1">
                                    <a href="{{ route('service.show', $item->slug) }}"
                                        title="{{ $item->title ?? null }}" class="hover:underline">
                                        {{ $item->title ?? null }}
                                    </a>
                                </h3>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </x-wrapper>
</x-layouts.app>
