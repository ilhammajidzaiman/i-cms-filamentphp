<x-layouts.app title="{{ $record->title ?? null }}">
    <x-wrapper id="file" class="py-4">
        <x-container>
            <div class="w-full grid grid-cols-12 gap-8 md:gap-12">
                <div class="w-full col-span-full md:col-span-8 space-y-4">
                    <x-sections.breadcrumb>
                        <x-sections.breadcrumb.item href="{{ route('index') }}"
                            value="{{ Str::ucfirst(__('beranda')) }}" />
                        <x-sections.breadcrumb.icon />
                        <x-sections.breadcrumb.item href="{{ route('file.index') }}"
                            value="{{ Str::ucfirst(__('dokumen')) }}" />
                        <x-sections.breadcrumb.icon />
                        <x-sections.breadcrumb.item href="{{ route('file.index') }}"
                            value="{{ $record->category?->title ?? null }}" />
                    </x-sections.breadcrumb>
                    <h1 class="font-bold text-3xl">
                        {{ $record->title ?? null }}
                    </h1>
                    <h6 class="text-slate-500">
                        {{ $record->created_at ? $record->formatDayDate($record->created_at) : null }}.
                    </h6>
                    @if ($record->file)
                        <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                            <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('/images/default-img.svg') }}"
                                alt="image" class="w-full h-full object-contain">
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($record->attachment as $item)
                            <div class="space-y-4">
                                <div
                                    class="flex items-center justify-center aspect-video w-full bg-slate-200 overflow-hidden rounded-xl">
                                    @if (Str::endsWith($item, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <img src="{{ $item ? asset('storage' . $item) : asset('/image/default-img.svg') }}"
                                            alt="image" class="w-full h-full object-contain" />
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-16 text-sky-950">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex justify-start">
                                    <a href="{{ route('file.download', $item) }}" target="__blank"
                                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-white bg-sky-950 hover:bg-sky-900 transition duration-300 ease-in-out">
                                        {{ Str::title(__('unduh')) }}
                                        {{ pathinfo($item, PATHINFO_EXTENSION) }}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
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
                                            {{ $record->user->name ?? null }}
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
                                    <a href="{{ route('file.show', $item->slug) }}" title="{{ $item->title ?? null }}"
                                        class="hover:underline">
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
