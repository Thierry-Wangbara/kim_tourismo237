@props(['provider' => 'google', 'text' => ''])

@php
    $providers = [
        'google' => [
            'class' => 'btn-outline-danger',
            'icon' => 'bi-google',
            'text' => 'Continuer avec Google'
        ],
        'facebook' => [
            'class' => 'btn-outline-primary',
            'icon' => 'bi-facebook',
            'text' => 'Continuer avec Facebook'
        ],
        'twitter' => [
            'class' => 'btn-outline-info',
            'icon' => 'bi-twitter',
            'text' => 'Continuer avec Twitter'
        ],
        'github' => [
            'class' => 'btn-outline-dark',
            'icon' => 'bi-github',
            'text' => 'Continuer avec GitHub'
        ]
    ];
    
    $providerData = $providers[$provider] ?? $providers['google'];
@endphp

<button type="button" class="btn {{ $providerData['class'] }} w-100 mb-3">
    <i class="{{ $providerData['icon'] }} me-2"></i>{{ $text ?: $providerData['text'] }}
</button>
