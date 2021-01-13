@if ($paginator->hasPages())
    <div role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                &lt;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__number" aria-label="{{ __('pagination.previous') }}">
                &lt;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="pagination__number">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="{{ $url }}" class="pagination__number current" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="pagination__number" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__number" aria-label="{{ __('pagination.next') }}">
                &gt;
            </a>
        @else
            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                &gt;
            </span>
        @endif
    </div>
@endif
