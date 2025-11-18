@extends('layouts.base')

@section('content')
<section class="relative py-24">
    {{-- Background Image --}}
    <picture class="absolute inset-0 w-full h-full ">
        <source media="(max-width: 480px)"
            srcset="https://static.cozycozy.com/images/catalog/bg/maroc.jpg">
        <img src="https://static.cozycozy.com/images/catalog/bg/maroc.jpg" alt="location vacances Maroc"
            class="w-full h-full object-cover">
    </picture>

    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-black/50"></div>
    <!-- Change opacity: bg-black/40 bg-black/60 bg-black/70 -->

    {{-- Content Overlay --}}
    <div class="relative z-10">

        {{-- Title and Subtitle --}}
        <div class="text-center py-12 px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 text-border">
                Trouvez votre futur bien immobilier
            </h1>
            <p class="text-lg md:text-2xl text-shadow-2xs text-white/90">
                Vente et location <br> d’appartements, villas, maisons, terrains et locaux commerciaux.
            </p>
        </div>

        {{-- Search Form --}}
        <div class="max-w-4xl mx-auto px-4 pb-8 hidden lg:block">
            @livewire('filter-form')
        </div>
    </div>
</section>
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-xl md:text-2xl font-bold mb-4">Locations Vacances Maroc</h1>

    @if($properties && $properties->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($properties as $property)
        <x-property-card :property="[
                    'image' => Storage::url($property?->images?->first()?->path),
                    'rating' => 9.8,
                    'reviews_count' => 49,
                    'city' => $property->city->name,
                    'type' => $property->type,
                    'title' => $property->title,
                    'guests' => 4,
                    'bedrooms' => 2,
                    'bathrooms' => 2,
                    'description' => Str::limit($property->description, 80, '...'),
                    'price' => $property->price,
                    'is_featured' => true,
                    'search_dates' => '02/01 – 09/01',
                    'slug' => $property->slug,
                    'total_price' => 3150,
                    'nights' => 7
                ]" />
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $properties->links() }}
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-16 px-4">
        <!-- Icon -->
        <div class="mb-6">
            <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
        </div>

        <!-- Title -->
        <h3 class="text-xl font-semibold text-gray-700 mb-2">
            Aucune propriété disponible
        </h3>

        <!-- Description -->
        <p class="text-gray-500 text-center max-w-md mb-6">
            Nous n'avons trouvé aucune propriété correspondant à vos critères. Essayez de modifier vos filtres ou
            revenez
            plus tard.
        </p>
    </div>
    @endif

    @livewire('contact-form')
</div>
@endsection
