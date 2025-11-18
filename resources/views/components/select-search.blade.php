<!-- resources/views/components/select-search.blade.php -->
@props([
'name' => 'select-menu',
'label' => '',
'placeholder' => 'Tous',
'options' => [],
'selected' => '',
'icon' => null
])

<div x-data="{
    open: false,
    selectedValue: '{{ $selected }}',
    searchQuery: '',
    placeholderText: '{{ $placeholder }}',
    options: {{ json_encode($options) }},
    selectedOption: null,
    focusedIndex: 0,

    init() {
      this.setSelected(this.selectedValue, false);
    },

    get filteredOptions() {
      if (!this.searchQuery) return this.options;

      return this.options.filter(option =>
        option.label.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },

    openMenu() {
      this.open = true;
      this.searchQuery = '';
      this.focusedIndex = 0;

      $nextTick(() => {
        $refs.searchInput?.focus();
      });
    },

    closeMenu() {
      this.open = false;
      this.searchQuery = '';

      $nextTick(() => {
        $refs.selectButton?.focus();
      });
    },

    setSelected(value, closeMenu = true) {
      this.selectedValue = value;
      this.selectedOption = this.getSelected();

      if (closeMenu) {
        this.closeMenu();
      }
    },

    getSelected() {
      return this.selectedValue
        ? this.options.find(opt => opt.value === this.selectedValue) || null
        : null;
    },

    isSelected(value) {
      return value === this.selectedValue;
    },

    handleKeydown(e) {
      const filtered = this.filteredOptions;

      if (e.key === 'ArrowDown') {
        e.preventDefault();
        this.focusedIndex = Math.min(this.focusedIndex + 1, filtered.length - 1);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
      } else if (e.key === 'Enter' && filtered[this.focusedIndex]) {
        e.preventDefault();
        this.setSelected(filtered[this.focusedIndex].value);
      } else if (e.key === 'Escape') {
        e.preventDefault();
        this.closeMenu();
      }
    }
  }" class="relative w-full">
    <!-- Hidden native select for form submission -->
    <select id="{{ $name }}" name="{{ $name }}" class="hidden" tabindex="-1" aria-hidden="true" x-model="selectedValue">
        <option value=""></option>
        <template x-for="option in options" :key="option.value">
            <option :value="option.value" x-text="option.label"></option>
        </template>
    </select>

    <!-- Select Button -->
    <div class="flex flex-col">
        @if($label)
        <label class="text-sm md:text-md text-gray-500 font-semibold uppercase tracking-wider mb-0.5">
            {{ $label }}
        </label>
        @endif

        <button x-ref="selectButton" x-on:click="openMenu()" type="button"
            class="outline-none bg-transparent text-gray-900 font-medium text-sm whitespace-nowrap cursor-pointer text-left flex items-center justify-between w-full py-1">
            <span x-text="selectedOption ? selectedOption.label : placeholderText"
                x-bind:class="{ 'text-gray-400': !selectedOption }"></span>
            <svg class="w-4 h-4 whitespace-nowrap text-gray-400 ml-1 transition-transform" x-bind:class="{ 'rotate-180': open }"
                fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
    </div>

    <!-- Dropdown Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-2" x-on:click.outside="closeMenu()"
        x-on:keydown="handleKeydown($event)"
        class="absolute left-0 right-0 z-50 mt-2 origin-top rounded-xl bg-white shadow-xl ring-1 ring-black/5 border border-gray-100 w-64"
        style="display: none;">
        <!-- Search Input -->
        <div class="p-2 border-b border-gray-100">
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                </div>
                <input x-ref="searchInput" x-model="searchQuery" type="text" placeholder="Rechercher..."
                    class="w-full rounded-lg border border-gray-200 bg-gray-50/50 py-2 pl-9 pr-3 text-sm focus:border-purple-400 focus:bg-white focus:ring-2 focus:ring-purple-400/20 focus:outline-none transition-all" />
            </div>
        </div>

        <!-- Options List -->
        <ul class="max-h-60 overflow-y-auto py-1" role="listbox">
            <template x-for="(option, index) in filteredOptions" :key="option.value">
                <li x-on:click="setSelected(option.value)" x-on:mouseenter="focusedIndex = index" x-bind:class="{
            'bg-purple-50': index === focusedIndex || isSelected(option.value),
            'hover:bg-gray-50': index !== focusedIndex && !isSelected(option.value)
          }" class="flex items-center justify-between gap-2 px-3 py-2.5 text-sm transition-colors cursor-pointer"
                    role="option">
                    <span x-text="option.label" x-bind:class="{
              'font-semibold text-purple-600': isSelected(option.value),
              'text-gray-700': !isSelected(option.value)
            }" class="grow"></span>
                    <svg x-show="isSelected(option.value)" class="w-4 h-4 flex-none text-purple-600"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" style="display: none;">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </li>
            </template>

            <!-- No Results -->
            <li x-show="filteredOptions.length === 0" class="px-3 py-8 text-center text-sm text-gray-400"
                style="display: none;">
                Aucun résultat trouvé
            </li>
        </ul>
    </div>
</div>

