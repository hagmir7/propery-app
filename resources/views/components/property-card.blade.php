{{-- resources/views/components/property-card.blade.php --}}
@props(['property'])

<a href="{{ route("property.show", $property['slug']) }}">
    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300">
        {{-- Property Image --}}
        <div class="relative h-72 overflow-hidden">
            <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">

            @if(isset($property['featured']) && $property['featured'])
            <div class="absolute top-2 right-2 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                Vedette
            </div>
            @endif
        </div>

        {{-- Property Details --}}
        <div class="p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                {{ $property['title'] ?? 'Sans titre' }}
            </h2>
            <p>{{ $property['description'] }}</p>

            {{-- Location --}}
            @if(isset($property['location']))
            <div class="flex items-center text-gray-600 text-sm mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $property['location'] }}
            </div>
            @endif

            {{-- Features --}}
            <div class="flex items-center gap-4 text-sm text-gray-600 mb-3 mt-2">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $property['city'] }}, Maroc
                </div>
            </div>

            {{-- Price --}}
            <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                <div>
                    @if(isset($property['price']))
                    <span class="text-2xl font-bold text-gray-800">{{ $property['price'] }} MAD</span>
                    @endif
                </div>

                @if(isset($property['rating']))
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <span class="ml-1 text-gray-700 font-semibold">{{ $property['rating'] }}</span>
                </div>
                @endif
            </div>

            {{-- View Button --}}
            @if(isset($property['url']) || isset($property['id']))
            <a href="{{ $property['url'] ?? route('property.show', $property['id']) }}"
                class="mt-4 block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-lg font-medium transition-colors duration-200">
                Voir les détails
            </a>
            @endif
        </div>
    </div>
</a>
