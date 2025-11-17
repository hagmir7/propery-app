<div class="max-w-7xl mx-auto" x-data="{
    currentIndex: 0,
    images: {{ json_encode($images->map(fn($img) => Storage::url($img->path))->toArray()) }},

    switchImage(index) {
        if (this.currentIndex !== index) {
            this.currentIndex = index;
        }
    },

    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },

    prevImage() {
        this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1;
    }
}">

    {{-- Main Image Container --}}
    <div class="relative mb-6 rounded-xl overflow-hidden bg-gray-100 shadow-sm group">
        <div class="relative h-96 md:h-[500px] lg:h-[500px]">
            {{-- Image Display --}}
            @forelse ($images as $index => $image)
            <div x-show="currentIndex === {{ $index }}" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="absolute inset-0">
                <img src="{{ Storage::url($image->path) }}" class="w-full h-full object-cover"
                    alt="Property image {{ $index + 1 }}">
            </div>
            @empty
            {{-- Fallback if no images --}}
            <img src="/api/placeholder/1200/600" class="w-full h-full object-cover" alt="Placeholder image">
            @endforelse

            {{-- Navigation Arrows --}}
            @if(count($images) > 1)
            <button @click="prevImage()"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button @click="nextImage()"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            @endif

            {{-- Image Counter --}}
            @if(count($images) > 1)
            <div
                class="absolute bottom-4 right-4 bg-black/70 text-white px-4 py-2 rounded-full text-sm font-medium backdrop-blur-sm">
                <span x-text="currentIndex + 1"></span> / <span>{{ count($images) }}</span>
            </div>
            @endif
        </div>
    </div>

    {{-- Thumbnails Grid --}}
    @if(count($images) > 1)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
        @foreach ($images as $index => $image)
        <div @click="switchImage({{ $index }})"
            :class="currentIndex === {{ $index }} ? 'ring-4 ring-blue-500 scale-95' : 'hover:ring-2 hover:ring-gray-300'"
            class="relative overflow-hidden rounded-lg cursor-pointer transition-all duration-300 shadow-md hover:shadow-xl group">
            <img src="{{ Storage::url($image->path) }}"
                class="w-full h-24 md:h-28 object-cover transition-transform duration-300 group-hover:scale-110"
                alt="Thumbnail {{ $index + 1 }}">

            {{-- Overlay on active thumbnail --}}
            <div x-show="currentIndex === {{ $index }}" x-transition
                class="absolute inset-0 bg-blue-500/20 flex items-center justify-center">
                <svg class="w-8 h-8 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- Placeholder thumbnails if no images --}}
    @if(count($images) === 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4">
        @for ($i = 0; $i < 4; $i++) <div class="overflow-hidden rounded-lg border border-gray-200 shadow-sm">
            <img src="/api/placeholder/300/200" class="w-full h-24 md:h-28 object-cover opacity-50">
    </div>
    @endfor
</div>
@endif

</div>
