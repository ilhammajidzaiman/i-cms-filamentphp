<section class="w-full border-b border-slate-200">
    <div class="bg-radial-[at_50%_0%] from-sky-100 via-transparent to-transparent">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div class="md:border-x border-slate-200 space-y-8 p-4 md:p-12">
                <div class="flex text-center">
                    <div class="grow items-start space-y-4">
                        <h1 class="text-4xl">
                            {{ 'Team' }}
                        </h1>
                        <h3 class="">
                            {{ 'Tim kami yang sangat kompeten dibidangnya dalam pengambangan aplikasi.' }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="md:border-x border-slate-200 space-y-8">
                <div class="mx-auto">
                    <div x-data="{
                        scrollAmount: 350,
                        scrollLeft() {
                            const s = this.$refs.scroller;
                            s.scrollBy({ left: -this.scrollAmount, behavior: 'smooth' });
                            setTimeout(() => {
                                if (s.scrollLeft <= 0) {
                                    s.scrollLeft = s.scrollWidth;
                                }
                            }, 300);
                        },
                        scrollRight() {
                            const s = this.$refs.scroller;
                            s.scrollBy({ left: this.scrollAmount, behavior: 'smooth' });
                            setTimeout(() => {
                                if (s.scrollLeft + s.clientWidth >= s.scrollWidth - 5) {
                                    s.scrollLeft = 0;
                                }
                            }, 300);
                        }
                    }" class="relative">
                        <div x-ref="scroller"
                            class="flex overflow-x-auto scroll-smooth snap-x snap-mandatory items-stretch hide-scrollbar gap-4 px-12 py-8">
                            @foreach ($people as $item)
                                <div class="snap-center flex self-stretch">
                                    <div
                                        class="w-72 h-full flex flex-col bg-white border border-slate-200 hover:shadow-lg space-y-4 p-8">
                                        <div class="relative mx-auto w-40">
                                            <div
                                                class="absolute -right-2 top-6 aspect-square w-8 rounded-full bg-slate-200">
                                            </div>
                                            <div class="absolute -left-2 bottom-5 grid grid-cols-3 gap-1">
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                                <span class="aspect-square w-2 rounded-full bg-slate-200"></span>
                                            </div>
                                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                                alt="image {{ $item->name ?? null }}"
                                                class="relative z-10 aspect-square w-40 rounded-full object-cover border-4 border-sky-900 bg-white p-2">
                                        </div>
                                        <div class="text-center flex flex-col grow space-y-2">
                                            <h2 class="text-lg font-semibold">
                                                {{ $item->name ?? null }}
                                            </h2>
                                            <div
                                                class="self-center text-white text-sm border bg-sky-950 hover:bg-sky-900 rounded-xl px-4 py-2">
                                                {{ $item->position->title ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-center gap-4 pb-8">
                            <button @click="scrollLeft()" type="button"
                                class="flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-600 transition hover:bg-sky-500 hover:text-white hover:border-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button @click="scrollRight()" type="button"
                                class="flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-600 transition hover:bg-sky-500 hover:text-white hover:border-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
