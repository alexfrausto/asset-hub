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
        <div class="grow-1">
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>
                                <a href="" class="flex items-center gap-1">
                                    {{ __('Name') }}
                                    <x-heroicon-o-chevron-up-down class="size-5" />
                                </a>
                            </th>
                            <th>
                                <a href="" class="flex items-center gap-1">
                                    {{ __('Email') }}
                                    <x-heroicon-o-chevron-up-down class="size-5" />
                                </a>
                            </th>
                            <th>
                                <a href="" class="flex items-center gap-1">
                                    {{ __('Created At') }}
                                    <x-heroicon-o-chevron-up-down class="size-5" />
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-base-content/50">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
