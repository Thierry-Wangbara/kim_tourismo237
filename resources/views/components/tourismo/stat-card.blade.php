@props(['value', 'label', 'icon' => null])

<div class="text-center">
    @if($icon)
        <div class="text-2xl mb-2">{{ $icon }}</div>
    @endif
    <div class="text-4xl font-bold text-white mb-2">{{ $value }}</div>
    <div class="text-indigo-100">{{ $label }}</div>
</div>
