@if ($carousel)
    <div class="w-full border-b border-slate-200 overflow-hidden">
        <div class="w-full md:max-w-7xl mx-auto px-4 pt-5">
            <div x-data="{
                active: 0,
                total: {{ count($carousel) }},
                timer: null,
                next() {
                    this.active = (this.active + 1) % this.total
                    this.restart()
                },
                prev() {
                    this.active = (this.active - 1 + this.total) % this.total
                    this.restart()
                },
                goTo(index) {
                    this.active = index
                    this.restart()
                },
                restart() {
                    clearInterval(this.timer)
                    this.timer = setInterval(() => this.next(), 4000)
                },
                init() {
                    this.timer = setInterval(() => this.next(), 4000)
                }
            }">
                <div class="bg-radial-[at_50%_100%] from-sky-100 via-transparent to-transparent space-y-4">
                    <div class="relative w-full aspect-3/4 md:aspect-video">
                        @foreach ($carousel as $index => $item)
                            <div x-show="active === {{ $index }}" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 blur-md translate-x-12"
                                x-transition:enter-end="opacity-100 blur-0 translate-x-0"
                                x-transition:leave="transition ease-in duration-300 absolute inset-0"
                                x-transition:leave-start="opacity-100 blur-0 translate-x-0"
                                x-transition:leave-end="opacity-0 blur-md -translate-x-12"
                                class="absolute inset-0 w-full h-full flex md:items-center">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-24 md:items-center">
                                    <div class="order-2 md:order-1 text-center md:text-start space-y-4 md:space-y-8">
                                        <h1 class="text-2xl md:text-4xl font-bold">
                                            {{ $item->title }}
                                        </h1>
                                        <p class="text-slate-500">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="order-1 md:order-2 flex justify-center md:justify-start">
                                        <div class="w-full aspect-video rounded-xl overflow-hidden bg-slate-200">
                                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                                alt="{{ $item->title }}"
                                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                                class="w-full h-full aspect-video object-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-center gap-4 pb-4">
                        <button @click="prev()" type="button"
                            class="flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-600 transition hover:bg-sky-500 hover:text-white hover:border-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                        <div class="flex items-center gap-2">
                            @foreach ($carousel as $index => $item)
                                <button @click="goTo({{ $index }})"
                                    :class="active === {{ $index }} ?
                                        'w-8 bg-sky-500' :
                                        'w-3 bg-slate-200 hover:bg-sky-400'"
                                    type="button" class="size-3 rounded-full transition-all duration-300"></button>
                            @endforeach
                        </div>
                        <button @click="next()" type="button"
                            class="flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-600 transition hover:bg-sky-500 hover:text-white hover:border-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
