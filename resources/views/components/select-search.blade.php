<div class="relative w-full">
    @if($label)
    <label class="block mb-1 text-gray-700">{{ $label }}</label>
    @endif
    <input type="text" id="search-{{ $name }}" placeholder="Select..."
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
        readonly />
    <ul id="options-{{ $name }}"
        class="absolute z-10 w-full bg-white border border-gray-300 mt-1 rounded-md max-h-40 overflow-y-auto hidden">
        @foreach($options as $option)
        <li data-value="{{ $option['value'] }}" class="px-3 py-2 hover:bg-purple-100 cursor-pointer">{{ $option['label']
            }}</li>
        @endforeach
    </ul>
    <input type="hidden" name="{{ $name }}" id="selected-value-{{ $name }}" />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('search-{{ $name }}');
        const options = document.getElementById('options-{{ $name }}');
        const hiddenInput = document.getElementById('selected-value-{{ $name }}');
        const items = options.querySelectorAll('li');

        input.addEventListener('click', () => options.classList.toggle('hidden'));

        items.forEach(item => {
            item.addEventListener('click', () => {
                input.value = item.textContent;
                hiddenInput.value = item.getAttribute('data-value');
                options.classList.add('hidden');
            });
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest(`#search-{{ $name }}, #options-{{ $name }}`)) {
                options.classList.add('hidden');
            }
        });
    });
</script>


{{-- @php
$options = [
['label' => 'Apple', 'value' => 1],
['label' => 'Banana', 'value' => 2],
['label' => 'Cherry', 'value' => 3],
['label' => 'Date', 'value' => 4],
];
@endphp

<x-select-search name="fruit" label="Select a fruit" :options="$options" /> --}}
