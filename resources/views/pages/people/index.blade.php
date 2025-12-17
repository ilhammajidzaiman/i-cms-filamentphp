<x-layouts.app title="{{ Str::title(__('tim kami')) }}">
    <x-wrapper id="people" class="py-4">
        <x-container class="space-y-8">
            <x-sections.header class="text-start">
                <x-sections.header.title value="tim kami" />
                <x-sections.header.hr class="ms-0" />
            </x-sections.header>
            <livewire:page-people />
        </x-container>
    </x-wrapper>
</x-layouts.app>
