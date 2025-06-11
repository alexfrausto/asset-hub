@php
    use App\View\Components\Table\TableSortHelper;

    $perPage = request()->input('perPage', 10);
    $items = $query->paginate($perPage)->withQueryString();
@endphp

<div class="grow-1">
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>
                            @if ($column->sortable)
                                @php $sort = TableSortHelper::sortUrl($column->key); @endphp
                                <a href="{{ $sort['url'] }}" class="flex items-center gap-1">
                                    {{ $column->label }}
                                    @if ($sort['direction'] === 'asc')
                                        <x-heroicon-o-chevron-up class="size-3" />
                                    @elseif ($sort['direction'] === 'desc')
                                        <x-heroicon-o-chevron-down class="size-3" />
                                    @else
                                        <x-heroicon-o-chevron-up-down class="size-5" />
                                    @endif
                                </a>
                            @else
                                {{ $column->label }}
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($items as $row)
                    <tr
                        @if ($href) onclick="window.location.href='{{ route($href, $row->id) }}'"
                            class="hover:bg-base-200 cursor-pointer"
                        @elseif ($onclick)
                            x-data
                            @click="{{ $onclick }}"
                            class="hover:bg-base-200 cursor-pointer" @endif>
                        @foreach ($columns as $column)
                            <td>{{ $column->getContents($row) }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-base-content/50">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>

</div>
