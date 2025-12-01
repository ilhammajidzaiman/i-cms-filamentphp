<x-layouts.app title="{{ Str::title(__('mitra kami')) }}">
    <x-wrapper id="partner" class="py-4">
        <x-container class="space-y-8">
            <x-sections.header class="text-start">
                <x-sections.header.title value="mitra kami" />
                <x-sections.header.hr class="ms-0" />
            </x-sections.header>
            <livewire:page-partner />
        </x-container>
    </x-wrapper>
</x-layouts.app>
