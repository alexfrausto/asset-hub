@props([
    'placeholder' => 'Search',
])

<label class="input w-full" x-data="{
    search: '{{ request('search') }}',
    debounceTimer: null,
    update() {
        clearTimeout(this.debounceTimer);
        this.debounceTimer = setTimeout(() => {
            const url = new URL(window.location.href);
            url.searchParams.set('search', this.search);
            url.searchParams.set('page', 1);
            window.location.href = url.toString();
        }, 400);
    },
    clear() {
        this.search = '';
        this.update();
    }
}" x-init="if (search !== '') $nextTick(() => $refs.searchInput.focus())">
    <x-heroicon-o-magnifying-glass class="h-[1em] opacity-50" />

    <input x-model="search" @input="update()" x-ref="searchInput" type="search" class="grow"
        placeholder="{{ $placeholder }}" />

    <button type="button" x-show="search" @click="clear" class="btn btn-xs btn-ghost">
        <x-heroicon-o-x-mark class="size-4" />
    </button>
</label>
