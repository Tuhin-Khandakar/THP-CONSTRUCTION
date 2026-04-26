@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-xs uppercase tracking-widest text-primary/70 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
