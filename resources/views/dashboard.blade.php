<x-app-layout title="Dashboard">

    <x-slot name="actions">
        <select class="select max-w-36" value="7">
            <option value="7">{{ __('Last 7 days') }}</option>
            <option value="15">{{ __('Last 15 days') }}</option>
            <option value="30">{{ __('Last 30 days') }}</option>
        </select>
    </x-slot>

    <div class="flex h-max w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-neutral" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-neutral" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-neutral" />
            </div>
        </div>
        <div class="relative aspect-[calc(4*3+1)/4] h-max flex-1 overflow-hidden rounded-xl border border-neutral-200">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-neutral" />
        </div>
    </div>
</x-app-layout>
