@if ($technology)
    <section class="w-full border-b border-slate-200">
        <div class ="md:max-w-7xl mx-auto md:px-4">
            <div class="md:border-x border-slate-200">
                <div class="flex divide-x divide-slate-200">
                    <div class="flex-none max-w-52 p-4">
                        <h3 class="font-mono">
                            {{ 'Dibangun dengan Teknologi Modern' }}
                        </h3>
                    </div>
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
                            <ul x-ref="container"
                                class="flex overflow-x-hidden hide-scrollbar divide-x divide-slate-200">
                                @foreach ($technology as $item)
                                    <li
                                        class="flex flex-none items-center transition duration-300 grayscale hover:grayscale-0 hover:text-sky-500 p-4">
                                        <div class="flex items-center space-x-4 ">
                                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                                alt="logo" class="h-12 object-contain">
                                            <div>
                                                <h1 class="">
                                                    {{ $item->title ?? null }}
                                                </h1>
                                                <h3 class="text-slate-500">
                                                    {{ $item->description ?? null }}
                                                </h3>
                                            </div>
                                        </div>
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
