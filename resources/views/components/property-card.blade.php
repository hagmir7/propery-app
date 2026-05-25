@props(['property'])

<a href="{{ route('property.show', $property['slug']) }}">
    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300">

        {{-- Property Image --}}
        <div class="relative h-72 overflow-hidden">
            <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">

            {{-- Left badges: Status --}}
            <div class="absolute top-2 left-2 flex flex-col gap-1">
                @if(isset($property['status']))
                @php
                $status = $property['status'] instanceof \App\Enums\PropertyStatusEnum
                ? $property['status']
                : \App\Enums\PropertyStatusEnum::from($property['status']);
                @endphp
                <span class="{{ $status->getColor() }} text-white px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $status->getLabel() }}
                </span>
                @endif
            </div>

            {{-- Right badge: Featured --}}
            @if(isset($property['is_featured']) && $property['is_featured'])
            <div class="absolute top-2 right-2 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                Vedette
            </div>
            @endif
        </div>

        {{-- Property Details --}}
        <div class="p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                {{ $property['title'] }}
            </h2>

            @if ($property['code'])
                <h3 class="text-md text-gray-700">Référence: <span class="font-semibold">{{ $property['code'] }}</span></h3>
            @endif
            <p class="text-gray-600 text-sm mb-3">{{ $property['description'] }}</p>

            <div class="flex flex-wrap gap-2 md:gap-3">

                {{-- Type --}}
                @if(isset($property['type']))
                <div class="flex items-center text-gray-600 text-sm">
                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                    {{ [
                    1 => 'Appartement',
                    2 => 'Villa',
                    3 => 'Maison',
                    4 => 'Terrain',
                    5 => 'Local commercial',
                    ][$property['type']] ?? '-' }}
                </div>
                @endif

                {{-- City --}}
                @if(isset($property['city']))
                <div class="flex items-center text-gray-600 text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $property['city'] }}
                </div>
                @endif

                {{-- Operation --}}
                @if(isset($property['operation']))
                <div class="flex items-center text-gray-600 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                        <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                        <path d="M12 12l0 .01" />
                        <path d="M3 13a20 20 0 0 0 18 0" />
                    </svg>
                    {{ $property['operation'] == 1 ? 'Vente' : 'Location' }}
                </div>
                @endif

            </div>

            {{-- Price --}}
            <div class="flex items-center justify-between pt-3 mt-3 border-t border-gray-200">
                @if(isset($property['price']))
                <span class="text-2xl font-bold text-gray-800">
                    {{ number_format($property['price'], 0, ',', ' ') }} MAD
                </span>
                @endif
            </div>
        </div>

    </div>
</a>
