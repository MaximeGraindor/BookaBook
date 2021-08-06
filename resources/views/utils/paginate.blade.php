@if ($paginator->hasPages())
    <ul class="bab-pagination">
        @if (!$paginator->onFirstPage())
            <li class="pagination-item">
                <a  class="pagination-previous"
                    href="{{ $paginator->previousPageUrl() }}"
                    title="Page précédente"></a>
            </li>
        @endif


        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item active">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="pagination-item">
                <a  class="pagination-next"
                    href="{{ $paginator->nextPageUrl() }}"
                    title="Page suivante"></a>
            </li>
        @endif

    </ul>
@endif
