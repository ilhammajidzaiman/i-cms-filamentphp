@if ($partner)
    <section class="w-full border-b border-slate-200">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div class="md:border-x border-slate-200 space-y-8 p-4 md:p-12">
                <div class="flex gap-8 mt-12">
                    <div class="grow items-start space-y-4">
                        <h1 class="text-4xl">
                            {{ 'Mitra' }}
                        </h1>
                        <h3 class="">
                            {{ 'Mitra yang telah mempercayai kami sebagai rekan dalam transformasi digital.' }}
                        </h3>
                    </div>
                    <div class="flex items-end justify-end">
                        <a wire:navigate href="{{ route('article.index') }}"
                            class="inline-flex items-center gap-2  font-medium hover:underline">
                            {{ Str::title('selengkapnya') }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:border-x border-slate-200 space-y-8">
                <div class ="mx-auto">
                    <div class="flex-2 overflow-hidden">
                        <div x-data="{
                            scrollSpeed: 1,
                            animating: false,
                            frame: null,
                            startAutoScroll() {
                                const el = this.$refs.container;
                                if (!el.dataset.cloned) {
                                    el.innerHTML += el.innerHTML;
                                    el.dataset.cloned = true;
                                }
                                this.animating = true;
                                const step = () => {
                                    if (!this.animating) return;
                                    el.scrollLeft += this.scrollSpeed;
                                    if (el.scrollLeft >= el.scrollWidth / 2) {
                                        el.scrollLeft = 0;
                                    }
                                    this.frame = requestAnimationFrame(step);
                                };
                                this.frame = requestAnimationFrame(step);
                            },
                            stopAutoScroll() {
                                this.animating = false;
                                cancelAnimationFrame(this.frame);
                            }
                        }" x-init="startAutoScroll()" @mouseenter="stopAutoScroll()"
                            @mouseleave="startAutoScroll()">
                            <ul x-ref="container" class="flex overflow-x-hidden space-x-12 hide-scrollbar">
                                @foreach ($technology as $item)
                                    <li
                                        class="flex flex-none items-center transition duration-300 grayscale hover:grayscale-0 hover:text-sky-500 p-4 md:p-8">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                            alt="logo" class="h-12 object-contain">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
