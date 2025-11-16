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
            {{-- Title --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                {{ $property['title'] ?? 'Sans titre' }}
            </h3>
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
                @if(isset($property['guests']))
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $property['city'] }}
                </div>
                @endif

                @if(isset($property['bedrooms']))
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 9.557V3h-2v2H6V3H4v6.557C2.81 10.25 2 11.525 2 13v4a1 1 0 0 0 1 1h1v4h2v-4h12v4h2v-4h1a1 1 0 0 0 1-1v-4c0-1.475-.81-2.75-2-3.443zM18 7v1h-5V6h5v1zm-11 1V6h5v2H7z" />
                    </svg>
                    {{ $property['bedrooms'] }} chambres
                </div>
                @endif

                @if(isset($property['bathrooms']))
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM7 20H4v-3h3v3zm0-5H4v-3h3v3zm0-5H4V7h3v3zm6 10h-3v-3h3v3zm0-5h-3v-3h3v3zm0-5h-3V7h3v3zm6 10h-3v-3h3v3zm0-5h-3v-3h3v3zm0-5h-3V7h3v3z" />
                    </svg>
                    {{ $property['bathrooms'] }} sdb
                </div>
                @endif
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
