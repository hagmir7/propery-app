@extends('layouts.base')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Main Content -->
            <main class="lg:col-span-8">
                <!-- Property Header -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                    @if(!empty($property->images))
                    <x-property-images :images="$property->images" />
                    @endif

                    <div class="flex items-start justify-between mb-4 mt-3">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ $property->title }}
                            </h1>

                            <p class="mb-2">{{ $property->description }}</p>

                            <div class="flex items-center text-md text-gray-600">
                                <div class="flex gap-3">
                                    <div class="flex items-center text-gray-600 text-md mb-2">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>
                                            {{ $property->city->name ?? '' }}
                                            @if(!empty($property->address)), {{ $property->address }}@endif
                                            , Maroc
                                        </span>
                                    </div>

                                    @if(!empty($property->type))
                                    @php
                                    $types = [
                                    1 => 'Appartement',
                                    2 => 'Villa',
                                    3 => 'Boutique',
                                    4 => 'Terrain',
                                    5 => 'Maison',
                                    ];
                                    @endphp

                                    <div class="flex items-center text-gray-600 text-md mb-2">
                                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>

                                        {{ $types[$property->type] ?? '' }}
                                    </div>
                                    @endif

                                    @if(!empty($property->operation))
                                    <div class="flex items-center text-gray-600 text-md mb-2">
                                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                            <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                        </svg>

                                        {{ $property->operation == 1 ? 'Vente' : 'Location' }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#booking"
                        class="w-full inline-block text-center bg-blue-600 text-white py-3 rounded-md font-medium hover:bg-blue-700 transition-colors">
                        Réservez une visite
                    </a>
                </div>

                @if(!empty($property->features) && count($property->features))
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-4">
                    <div class="grid grid-cols-4 gap-2 p-2">
                        @foreach ($property->features as $feature)
                        <div
                            class="col-span-2 md:col-span-1 border border-gray-300 rounded-md flex items-start space-x-3 p-2">
                            {!! $feature->svg_icon !!}
                            <div>
                                <p class="font-medium text-gray-900">{{ $feature->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($property->content))
                <!-- Property Description Section -->
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h2 class="text-xl font-semibold mb-4">À propos de cet établissement</h2>
                    <div class="prose max-w-none text-gray-700">
                        {!! $property->content !!}
                    </div>

                    @if(!empty($property->extra) && is_array($property->extra))
                    <div class="relative overflow-x-auto border-t-2 border-x-2 sm:rounded-lg mt-4">
                        <table class="w-full text-sm text-left rtl:text-right">
                            <tbody>
                                @foreach ($property->extra as $key => $value)
                                <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                                    <th scope="row" class="px-6 py-2 text-gray-900 whitespace-nowrap">
                                        {{ $key }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $value }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                @endif
            </main>

            <!-- Sidebar -->
            <aside class="lg:col-span-4 space-y-4" id="booking">
                <div class="lg:sticky top-24 z-40">
                    <!-- Search Box -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <h2 class="text-xl font-semibold mb-2 animate-shake-every-15s">
                            Envoyer la réservation
                        </h2>

                        @livewire('booking-form', ['property' => $property], key($property->id))
                    </div>

                    <!-- Map Preview -->
                    @if(!empty($property->location_map))
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mt-3">
                        <div class="relative h-60 bg-gray-200">
                            {!! $property->location_map !!}
                        </div>
                    </div>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
