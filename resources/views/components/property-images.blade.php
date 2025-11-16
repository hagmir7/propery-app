<div class="max-w-7xl mx-auto">

    {{-- Main Image --}}
    <div class="mb-4">
        <img src="{{ count($images) ? Storage::url($images[0]->path) : '/api/placeholder/1200/600' }}"
            class="w-full h-96 object-cover rounded-lg border border-gray-200" alt="Main image">
    </div>

    {{-- Thumbnails --}}
    <div class="grid grid-cols-4 gap-4">
        @forelse ($images as $image)
        <div class="overflow-hidden rounded-lg border border-gray-100 transition cursor-pointer">
            <img src="{{ Storage::url($image->path) }}"
                class="w-full h-32 object-cover hover:scale-105 transition duration-300" alt="Property image">
        </div>
        @empty
        {{-- In case no images --}}
        @for ($i = 0; $i < 4; $i++) <div class="overflow-hidden rounded-lg border border-gray-100">
            <img src="/api/placeholder/300/200" class="w-full h-32 object-cover">
    </div>
    @endfor
    @endforelse
</div>
</div>
