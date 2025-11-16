<form wire:submit='submit' class="space-y-4">
    @if (session()->has('success'))
    <div class="p-3 mb-4 text-green-700 bg-green-100 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
    <!-- Nom et prénom -->
    <div>
        <label class="block text-md font-medium text-gray-700 mb-1">
            {{ __("Nom et prénom") }}
        </label>

        <input type="text" placeholder="Nom complet..." wire:model='full_name' name="full_name"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('full_name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Téléphone -->
    <div>
        <label class="block text-md font-medium text-gray-700 mb-1">
            {{ __("Téléphone") }}
        </label>

        <input type="text" name="phone" placeholder="Téléphone..." wire:model='phone'
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('phone')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Date de visite -->
    <div>
        <label class="block text-md font-medium text-gray-700 mb-1">
            Date de visite
        </label>

        <input type="date" name="date" wire:model="date"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

        @error('date')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit button -->
    <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-md font-medium hover:bg-blue-700 transition-colors cursor-pointer">
        Envoyer
    </button>
</form>
