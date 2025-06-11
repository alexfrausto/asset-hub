@if ($paginator->hasPages())
    <div class="flex-1 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                    class="join-item btn btn-disabled">«</button>
            @else
                <a role="button" aria-label="{{ __('pagination.previous') }}" href="{{ $paginator->previousPageUrl() }}"
                    class="join-item btn">«</a>
            @endif

            <span class="hidden sm:block">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <button class="join-item btn btn-disabled">...</button>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button class="join-item btn btn-active">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="join-item btn"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </span>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a role="button" href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn"
                    aria-label="{{ __('pagination.next') }}">
                    »
                </a>
            @else
                <button aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="join-item btn">»</button>
            @endif
        </div>
    </div>
    </nav>
@endif
