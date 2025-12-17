<a wire:navigate href="{{ $href ?? null }}" {{ $attributes->merge(['class' => 'whitespace-nowrap hover:underline']) }}>
    {{ $value ?? null }}
</a>
