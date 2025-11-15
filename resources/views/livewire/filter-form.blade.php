
<form action="" method="GET"
    class="flex items-center bg-gray-50/80 border border-gray-200 rounded-2xl hover:border-purple-300 hover:bg-white focus-within:border-purple-500 focus-within:bg-white focus-within:shadow-lg transition-all duration-300">

    {{-- City --}}
    <div
        class="flex items-center px-4 py-1 border-r border-gray-200 hover:bg-gray-50/50 transition-colors rounded-l-2xl min-w-[140px]">
        <svg class="w-4 h-4 text-purple-600 mr-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
        </svg>
        <div class="flex flex-col flex-1">
            <label class="text-sm md:text-md text-gray-500 font-semibold uppercase tracking-wider mb-0.5">Ville</label>
            <select name="city" class="outline-none bg-transparent text-gray-900 font-medium text-sm cursor-pointer">
                <option value="">{{ __('Toutes') }}</option>
                <option value="casablanca" {{ request('city')=='casablanca' ? 'selected' : '' }}>
                    Casablanca</option>
                <option value="rabat" {{ request('city')=='rabat' ? 'selected' : '' }}>Rabat</option>
                <option value="marrakech" {{ request('city')=='marrakech' ? 'selected' : '' }}>Marrakech
                </option>
                <option value="tanger" {{ request('city')=='tanger' ? 'selected' : '' }}>Tanger</option>
                <option value="agadir" {{ request('city')=='agadir' ? 'selected' : '' }}>Agadir</option>
            </select>
        </div>
    </div>

    {{-- Type --}}
    <div
        class="flex items-center px-4 py-1 border-r border-gray-200 hover:bg-gray-50/50 transition-colors min-w-[160px]">
        <svg class="w-4 h-4 text-purple-600 mr-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
        </svg>
        <div class="flex flex-col flex-1">
            <label class="text-sm md:text-md text-gray-500 font-semibold uppercase tracking-wider mb-0.5">Type</label>
            <select name="property_type"
                class="outline-none bg-transparent text-gray-900 font-medium text-sm cursor-pointer">
                <option value="">{{ __('Tous') }}</option>
                <option value="appartement" {{ request('property_type')=='appartement' ? 'selected' : '' }}>
                    Appartement</option>
                <option value="villa" {{ request('property_type')=='villa' ? 'selected' : '' }}>Villa
                </option>
                <option value="maison" {{ request('property_type')=='maison' ? 'selected' : '' }}>Maison
                </option>
                <option value="terrain" {{ request('property_type')=='terrain' ? 'selected' : '' }}>
                    Terrain</option>
                <option value="local" {{ request('property_type')=='local' ? 'selected' : '' }}>Local
                    commercial</option>
            </select>
        </div>
    </div>

    {{-- Operation --}}
    <div
        class="flex items-center px-4 py-1 border-r border-gray-200 hover:bg-gray-50/50 transition-colors min-w-[140px]">
        <svg class="w-4 h-4 text-purple-600 mr-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
            </path>
        </svg>
        <div class="flex flex-col flex-1">
            <label
                class="text-sm md:text-md text-gray-500 font-semibold uppercase tracking-wider mb-0.5">Opération</label>
            <select name="operation"
                class="outline-none bg-transparent text-gray-900 font-medium text-sm cursor-pointer">
                <option value="">{{ __('Tous') }}</option>
                <option value="1" {{ request('operation')=='1' ? 'selected' : '' }}>Vente</option>
                <option value="2" {{ request('operation')=='2' ? 'selected' : '' }}>Location</option>
            </select>
        </div>
    </div>

    {{-- Price --}}
    <div class="flex items-center px-4 py-1 hover:bg-gray-50/50 transition-colors flex-1">
        <svg class="w-4 h-4 text-purple-600 mr-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
        <div class="flex flex-col flex-1">
            <label class="text-sm md:text-md text-gray-500 font-semibold uppercase tracking-wider mb-0.5">Prix
                (MAD)</label>
            <div class="flex items-center gap-2">
                <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min" min="0"
                    class="outline-none bg-transparent text-gray-900 font-medium text-sm w-20 md:w-16 placeholder:text-gray-400">
                <span class="text-gray-300 font-medium">—</span>
                <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max" min="0"
                    class="outline-none bg-transparent text-gray-900 font-medium text-sm w-20 md:w-16 placeholder:text-gray-400">
            </div>
        </div>
    </div>

    {{-- Search Button --}}
    <button type="submit"
        class="bg-purple-600 text-white font-semibold px-3 py-2 rounded-2xl hover:from-purple-700 hover:to-purple-800 active:scale-95 transition-all duration-200 flex items-center gap-2 shadow-md hover:shadow-lg mr-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
            <circle cx="11" cy="11" r="8"></circle>
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
        </svg>
        <span class="hidden lg:inline">Chercher</span>
    </button>
</form>
