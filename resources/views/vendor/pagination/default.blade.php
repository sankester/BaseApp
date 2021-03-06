@if ($paginator->hasPages())
    <ul class="pagination pagination-flat ">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled"><span>Prev</span></li>
        @else
            <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">Prev</a></li>
            {{--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>--}}
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next</a></li>
            {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
        @else
            <li class="next disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
