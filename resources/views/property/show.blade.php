@extends('layouts.base')

@section('content')

<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">


            <!-- Main Content -->
            <main class="lg:col-span-8">
                <!-- Property Header -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                    <x-property-images :images="$property->images" />
                    <div class="flex items-start justify-between mb-4 mt-3">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ $property->title }}
                            </h1>
                            <p class="mb-2">{{ $property->description }}</p>
                            <div class="flex items-center text-md text-gray-600">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C7.589 0 4 3.589 4 8c0 3.51 5 12.025 7.148 15.524A1 1 0 0012 24a.99.99 0 00.852-.477C15 20.026 20 11.514 20 8c0-4.411-3.589-8-8-8zm0 11.5A3.5 3.5 0 1115.5 8 3.5 3.5 0 0112 11.5z" />
                                </svg>
                                <span>{{ $property->city->name }}{{ $property->address ? ' ,'.  $property->address : ''}}, Maroc</span>
                                {{-- <span class="mx-2">–</span>
                                <a href="#map" class="text-blue-600 hover:underline">Voir la carte</a> --}}
                            </div>
                        </div>
                    </div>

                    <a href="#booking"
                        class="w-full inline-block text-center bg-blue-600  text-white py-3 rounded-md font-medium hover:bg-blue-700 transition-colors">
                        Réservez une visite
                    </a>
                </div>

                @if (count($property->features))
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-4">
                    <div class="grid grid-cols-4 gap-2 p-2">
                        @foreach ($property->features as $feature)
                        <div class="col-span-2 md:col-span-1 border border-gray-300 rounded-md flex items-start space-x-3 p-2">
                            {!! $feature->svg_icon !!}
                            <div>
                                <p class="font-medium text-gray-900">{{ $feature->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @endif

                @if ($property->content)
                    <!-- Property Description Section -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <h2 class="text-xl font-semibold mb-4">À propos de cet établissement</h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $property->content !!}
                        </div>

                        @if ($property->extra)
                        <div class="relative overflow-x-auto border-t-2 border-x-2 sm:rounded-lg mt-4">
                            <table class="w-full text-sm text-left rtl:text-right">
                                <tbody>
                                    @foreach ($property->extra as $key => $value)
                                    <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
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
                <div class="lg:sticky top-24 z-50">
                    <!-- Search Box -->
                    <div class="bg-white rounded-lg shadow-sm p-4 ">
                        <h2 class="text-xl font-semibold mb-2 animate-shake-every-15s">
                            Envoyer la réservation
                        </h2>

                        @livewire('booking-form', ['property' => $property], key($property->id))
                    </div>

                    <!-- Map Preview -->
                    @if ($property->location_map)
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
