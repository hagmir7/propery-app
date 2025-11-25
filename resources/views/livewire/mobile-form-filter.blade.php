<form action="" method="GET" class="flex flex-col gap-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
        <div>
            <label class="block text-xs text-gray-500 mb-1">Ville</label>
            <select name="city" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                <option value="">{{ __('Toutes') }}</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ request('city')==$city->id ? 'selected' : '' }}>{{ $city->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-xs text-gray-500 mb-1">Type</label>
            <select name="property_type" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm">
                <option value="">{{ __('Tous') }}</option>
                <option value="1" {{ request('property_type')=='appartement' ? 'selected' : '' }}>
                    Appartement</option>
                <option value="2" {{ request('property_type')=='villa' ? 'selected' : '' }}>Villa
                </option>
                <option value="3" {{ request('property_type')=='maison' ? 'selected' : '' }}>Maison
                </option>
                <option value="4" {{ request('property_type')=='terrain' ? 'selected' : '' }}>Terrain
                </option>
                <option value="5" {{ request('property_type')=='local' ? 'selected' : '' }}>Local commercial</option>
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
                <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min" min="0"
                    class="w-1/2 rounded-lg border border-gray-200 px-3 py-2 text-sm">
                <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max" min="0"
                    class="w-1/2 rounded-lg border border-gray-200 px-3 py-2 text-sm">
            </div>
        </div>
    </div>

    <div class="flex items-center gap-2">
        <button type="submit" class="flex-1 bg-[#112d6e] text-white py-2.5 rounded-lg font-semibold">Chercher</button>
        <button type="button" @click="mobileSearchOpen = false"
            class="px-4 py-2 rounded-lg border border-gray-200">Annuler</button>
    </div>
</form>
