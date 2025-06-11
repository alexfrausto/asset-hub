<x-app-layout :title="__('Users')">
    <x-slot name="actions">
        <div class="flex items-center gap-3 grow order-last sm:order-none justify-end">
            <div class="w-full lg:w-auto">
                <x-search-input />
            </div>
        </div>
        <a :href="route('users')" type="button" class="btn btn-primary text-primary-content">
            <span class="block">
                <x-heroicon-o-plus class="size-5" />
            </span>
            <span class="hidden lg:block">
                Create
            </span>
        </a>
    </x-slot>

    <div class="card bg-base-100 rounded-lg p-5 shadow-xs pt-2">
        <x-table :query="$users" :columns="$columns" href="dashboard" />
    </div>
</x-app-layout>
