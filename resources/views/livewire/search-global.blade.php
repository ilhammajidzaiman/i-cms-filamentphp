<div class="relative w-full lg:w-56 text-sm" x-data="{ open: false }" @click.outside="open = false">
    <div class="relative">
        <input type="text" wire:model.live="keyword" placeholder="{{ Str::ucfirst('cari disini...') }}"
            @focus="open = true"
            class="w-full bg-white rounded-lg border border-slate-200 px-2 py-1 pl-7 focus:outline-none focus:ring-1 focus:ring-sky-500 placeholder-slate-500">
        <button type="button" class="absolute inset-y-0 left-0 flex items-center px-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </div>
    @if (strlen($keyword) > 2)
        <div x-show="open" x-transition
            class="w-full lg:w-96 absolute right-0 mt-2 bg-white border border-slate-200 overflow-hidden z-50">
            <div class="max-h-96 divide-y divide-slate-200 overflow-y-auto">
                @if ($article && count($article))
                    <h1 class="font-bold p-4">
                        <a wire:navigate href="{{ route('article.index') }}" title="berita" class="hover:underline">
                            {{ Str::ucfirst('berita') }}
                        </a>
                    </h1>
                    @foreach ($article as $item)
                        <div wire:click="goToArticle('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full hover:bg-slate-100 p-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a wire:navigate {{ $item->slug ? route('article.show', $item->slug) : null }}"
                                            title="{{ $item->title ?? null }}" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square size-16 overflow-hidden rounded-xl">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                            alt="image"
                                            class="bg-slate-200 w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if ($category && count($category))
                    <h1 class="font-bold p-4">
                        <a wire:navigate href="{{ route('article.index') }}" title="berita" class="hover:underline">
                            {{ Str::ucfirst('kategori') }}
                        </a>
                    </h1>
                    @foreach ($category as $item)
                        <div wire:click="goToCategory('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full hover:bg-slate-100 p-4">
                            <h1 class="line-clamp-2">
                                <a wire:navigate href="{{ route('category.show', $item->slug) }}"
                                    title="{{ $item->title ?? null }}" class="hover:underline">
                                    {{ $item->title ?? null }}
                                </a>
                            </h1>
                        </div>
                    @endforeach
                @endif
                @if (blank($article) && blank($category))
                    <p class="p-4">
                        {{ Str::ucfirst('pencarian tidak ditemukan') }}
                    </p>
                @endif
            </div>
        </div>
    @endif
</div>
