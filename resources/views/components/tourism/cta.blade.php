@props(['title', 'subtitle', 'buttonText', 'buttonHref', 'background' => 'sarah'])

<section class="{{ $background }}">
    <div class="container text-center">
        <h2 class="mb-4">{{ $title }}</h2>
        <p class="mb-4">{{ $subtitle }}</p>
        <x-tourism.button href="{{ $buttonHref }}" variant="light" size="lg">
            {{ $buttonText }}
        </x-tourism.button>
    </div>
</section>
