<x-layouts.app title="{{ Str::title('beranda') }}">
    @include('pages.home.partial.carousel')
    @include('pages.home.partial.technology')
    {{-- @include('pages.home.partial.technology1') --}}
    @include('pages.home.partial.article')
    @include('pages.home.partial.partner')
    @include('pages.home.partial.service')
    @include('pages.home.partial.people')
    @include('pages.home.partial.file')
    @include('pages.home.partial.galery')
</x-layouts.app>
