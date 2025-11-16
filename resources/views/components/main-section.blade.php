<section class="relative">
    {{-- Background Image --}}
    <picture class="absolute inset-0 w-full h-full">
        <source media="(max-width: 480px)"
            srcset="/images/hero_casablancamorocco.jpg">
        <img src="/images/hero_casablancamorocco.jpg" alt="location vacances Maroc"
            class="w-full h-full object-cover">
    </picture>

    {{-- Content Overlay --}}
    <div class="relative z-10">

        {{-- Title and Subtitle --}}
        <div class="text-center py-12 px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                Airbnb et Locations Maroc
            </h1>
            <p class="text-lg md:text-xl text-white/90">
                93750 offres de locations vacances disponibles
            </p>
        </div>

        {{-- Search Form --}}
        <div class="max-w-4xl mx-auto px-4 pb-8">
            @livewire('filter-form')
        </div>

        {{-- Provider Logos --}}
        <div class="pb-8 px-4">
            <ul class="max-w-6xl mx-auto flex flex-wrap justify-center items-center gap-6 md:gap-8">
                @foreach([
                'airbnb', 'booking', 'gitesdefrance', 'abritel',
                'pierreetvacances', 'odalys', 'tuivillas',
                'skiplanet', 'belvilla', 'expedia', 'homestay'
                ] as $provider)
                <li class="h-8">
                    <img src="https://www.cozycozy.com/assets/providers/white/{{ $provider }}.svg" alt="{{ $provider }}"
                        loading="lazy" class="h-full w-auto opacity-90 hover:opacity-100 transition">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
