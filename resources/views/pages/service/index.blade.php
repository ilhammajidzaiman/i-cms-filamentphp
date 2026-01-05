<x-layouts.app title="{{ Str::title(__('layanan')) }}">
    <x-wrapper id="service" class="py-4">
        <x-container class="space-y-8">
            <x-sections.header class="text-start">
                <x-sections.header.title value="layanan kami" />
                <x-sections.header.hr class="ms-0" />
            </x-sections.header>
            <livewire:page-service />
        </x-container>
    </x-wrapper>
</x-layouts.app>
