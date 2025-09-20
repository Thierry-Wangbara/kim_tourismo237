@props(['title', 'subtitle', 'buttonText', 'buttonHref', 'background' => 'bg-indigo-600'])

<section class="py-20 {{ $background }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            {{ $title }}
        </h2>
        <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
            {{ $subtitle }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <x-tourismo.button href="{{ $buttonHref }}" variant="secondary" size="lg" class="shadow-lg hover:shadow-xl">
                {{ $buttonText }}
            </x-tourismo.button>
            <x-tourismo.button href="#contact" variant="outline" size="lg" class="border-white text-white hover:bg-white hover:text-indigo-600">
                Nous contacter
            </x-tourismo.button>
        </div>
    </div>
</section>
