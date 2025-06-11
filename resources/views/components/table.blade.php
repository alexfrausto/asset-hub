<div>
    <div class="grow-1">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th>
                                <a href="" class="flex items-center gap-1">
                                    {{ $column['label'] }}
                                    <x-heroicon-o-chevron-up-down class="size-5" />
                                </a>
                            </th>
                        @endforeach
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
