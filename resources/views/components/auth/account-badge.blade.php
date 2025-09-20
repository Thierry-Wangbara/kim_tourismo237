@props(['type' => 'tourist', 'size' => 'md'])

@php
    $types = [
        'tourist' => [
            'label' => 'Touriste',
            'icon' => 'bi-person',
            'class' => 'bg-primary',
            'color' => 'primary'
        ],
        'site_manager' => [
            'label' => 'Gestionnaire',
            'icon' => 'bi-geo-alt',
            'class' => 'bg-success',
            'color' => 'success'
        ],
        'admin' => [
            'label' => 'Administrateur',
            'icon' => 'bi-shield-check',
            'class' => 'bg-danger',
            'color' => 'danger'
        ]
    ];
    
    $typeData = $types[$type] ?? $types['tourist'];
    $sizeClasses = [
        'sm' => 'badge-sm',
        'md' => '',
        'lg' => 'badge-lg'
    ];
@endphp

<span class="badge {{ $typeData['class'] }} {{ $sizeClasses[$size] }}">
    <i class="{{ $typeData['icon'] }} me-1"></i>{{ $typeData['label'] }}
</span>

<style>
.badge-sm {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
}

.badge-lg {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}
</style>
