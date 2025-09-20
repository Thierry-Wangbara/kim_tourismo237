@props(['variant' => 'primary', 'size' => 'md', 'href' => null, 'icon' => null])

@php
    $baseClasses = 'btn';
    
    $variants = [
        'primary' => 'btn-primary',
        'secondary' => 'btn-secondary',
        'outline' => 'btn-outline-primary',
        'light' => 'btn-light',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'danger' => 'btn-danger',
    ];
    
    $sizes = [
        'sm' => 'btn-sm',
        'md' => '',
        'lg' => 'btn-lg',
    ];
    
    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($href)
    <a href="{{ $href }}" class="{{ $classes }}">
        @if($icon)
            <i class="bi bi-{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <i class="bi bi-{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
    </button>
@endif
