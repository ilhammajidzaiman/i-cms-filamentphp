{{-- <x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="galeri" />
            <x-sections.header.hr />
        </x-sections.header>

        @if ($image->isNotEmpty())
            <div class="grid grid-cols-12 gap-4">
                @foreach ($image as $item)
                    <div class="col-span-6 md:col-span-4">
                        <div class="aspect-square md:aspect-video overflow-hidden rounded-xl cursor-pointer">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
            <x-sections.footer>
                <x-sections.footer.description value="lihat galeri kami yang lainnya" />
                <x-sections.footer.link href="{{ route('index') }}" />
            </x-sections.footer>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper> --}}


{{-- <section class="w-full border-b border-slate-200 ">
    <div class ="md:max-w-7xl mx-auto">
        <div class="">
            <div class="flex divide-x divide-slate-200">
                <div class="flex-none max-w-64 p-4">
                    <h3 class="">
                        {{ 'Galeri' }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class ="mx-auto">
        <div class="">
            <div class="grid grid-cols-12">
                @foreach ($image as $item)
                    <div class="col-span-6 md:col-span-4">
                        <div class="aspect-square md:aspect-video overflow-hidden cursor-pointer">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}


<section class="w-full border-b border-slate-200">
    <div class="bg-radial-[at_50%_0%] from-sky-100 via-transparent to-transparent">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            {{-- <div class="md:border-x border-slate-200 space-y-8 p-4 md:p-12">
                <div class="text-center p-4 md:p-12">
                    <h1 class="text-4xl">
                        {{ 'Team' }}
                    </h1>
                    <h3>
                        {{ 'Tim kami yang sangat kompeten dibidangnya dalam pengambangan aplikasi.' }}
                    </h3>
                </div>
            </div> --}}
            <div class="md:border-x border-slate-200 space-y-8">
                <div class ="mx-auto">
                    <div class="grid grid-cols-12">
                        @foreach ($image as $item)
                            <div class="col-span-6 md:col-span-4">
                                <div class="aspect-square md:aspect-video overflow-hidden cursor-pointer">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                        class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
