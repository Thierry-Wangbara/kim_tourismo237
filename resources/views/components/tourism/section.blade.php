@props(['title', 'subtitle' => null, 'background' => 'bg-white', 'padding' => 'py-5'])

<section class="{{ $padding }} {{ $background }}">
    <div class="container">
        @if($title || $subtitle)
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    @if($title)
                        <h2 class="section-title">{{ $title }}</h2>
                    @endif
                    @if($subtitle)
                        <p>{{ $subtitle }}</p>
                    @endif
                </div>
            </div>
        @endif
        
        {{ $slot }}
    </div>
</section>
