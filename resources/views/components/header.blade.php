{{-- resources/views/components/header.blade.php --}}

<header x-data="{ mobileMenuOpen: false, mobileSearchOpen: false }"
    class="bg-white shadow-sm sticky top-0 z-50 backdrop-blur-sm bg-white/95">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4 md:gap-8">

            {{-- Left: Logo --}}
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="/" class="block group flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-purple-600 to-purple-800 rounded-lg flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-gray-900 tracking-tight">SAKANY</span>
                </a>
            </div>

            {{-- Mobile buttons (left of center) --}}
            <div class="flex items-center gap-2 md:hidden">
                {{-- Search toggle (mobile) --}}
                <button @click="mobileSearchOpen = !mobileSearchOpen" :aria-expanded="mobileSearchOpen.toString()"
                    class="p-2.5 rounded-lg hover:bg-gray-100 transition-colors" title="Search">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>

                {{-- Mobile menu toggle --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()"
                    class="p-2.5 rounded-lg hover:bg-gray-100 transition-colors" title="Menu">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>



            {{-- Search Bar (desktop and tablet) --}}
            <div class="flex-1 max-w-4xl hidden md:block">
                @livewire('filter-form')
            </div>

            {{-- Right side (desktop) --}}
            <div class="hidden md:flex items-center gap-3">


                {{-- Profile / menu --}}
                <div class="relative group">
                    {{-- Dropdown menu (desktop) --}}
                    @if (auth()->user())
                    <button
                        class="flex items-center gap-3 border border-gray-200 rounded-xl py-2 px-3 hover:shadow-md hover:border-gray-300 transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-purple-600 to-purple-800 rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </button>


                        <div
                            class="absolute right-0 mt-3 w-60 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 translate-y-2 py-2">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ auth()->user()->email }}</p>
                            </div>

                            <a href="/admi"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition-colors">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                    <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                    <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                    <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                </svg>
                                Tableau de bord
                            </a>

                            <a href="/admin/bookings"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Réservations
                            </a>


                            <hr class="my-2 border-gray-100">

                            <a href="/logout" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Déconnexion
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

    {{-- Mobile Search Panel --}}
    <div x-show="mobileSearchOpen" x-cloak class="md:hidden">
        <div class="px-4 pb-4 pt-2 bg-white border-t border-gray-100">
            <form action="" method="GET" class="flex flex-col gap-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Ville</label>
                        <select name="city" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                            <option value="">{{ __('Toutes') }}</option>
                            <option value="casablanca" {{ request('city')=='casablanca' ? 'selected' : '' }}>Casablanca
                            </option>
                            <option value="rabat" {{ request('city')=='rabat' ? 'selected' : '' }}>Rabat</option>
                            <option value="marrakech" {{ request('city')=='marrakech' ? 'selected' : '' }}>Marrakech
                            </option>
                            <option value="tanger" {{ request('city')=='tanger' ? 'selected' : '' }}>Tanger</option>
                            <option value="agadir" {{ request('city')=='agadir' ? 'selected' : '' }}>Agadir</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Type</label>
                        <select name="property_type" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                            <option value="">{{ __('Tous') }}</option>
                            <option value="appartement" {{ request('property_type')=='appartement' ? 'selected' : '' }}>
                                Appartement</option>
                            <option value="villa" {{ request('property_type')=='villa' ? 'selected' : '' }}>Villa
                            </option>
                            <option value="maison" {{ request('property_type')=='maison' ? 'selected' : '' }}>Maison
                            </option>
                            <option value="terrain" {{ request('property_type')=='terrain' ? 'selected' : '' }}>Terrain
                            </option>
                            <option value="local" {{ request('property_type')=='local' ? 'selected' : '' }}>Local
                                commercial</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Opération</label>
                        <select name="operation" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                            <option value="">{{ __('Tous') }}</option>
                            <option value="1" {{ request('operation')=='1' ? 'selected' : '' }}>Vente</option>
                            <option value="2" {{ request('operation')=='2' ? 'selected' : '' }}>Location</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Prix (MAD)</label>
                        <div class="flex gap-2">
                            <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min"
                                min="0" class="w-1/2 rounded-lg border border-gray-200 px-3 py-2 text-sm">
                            <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max"
                                min="0" class="w-1/2 rounded-lg border border-gray-200 px-3 py-2 text-sm">
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit"
                        class="flex-1 bg-purple-600 text-white py-2.5 rounded-lg font-semibold">Chercher</button>
                    <button type="button" @click="mobileSearchOpen = false"
                        class="px-4 py-2 rounded-lg border border-gray-200">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Mobile Menu Panel --}}
    <div x-show="mobileMenuOpen" x-cloak class="md:hidden">
        <div class="px-4 pb-4 pt-2 bg-white border-t border-gray-100 space-y-2">
            <a href="" class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Mon profil
            </a>

            <a href="" class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
                Mes favoris
            </a>

            <a href="" class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-50 text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Déconnexion
            </a>
        </div>
    </div>

</header>
