@if ($paginator->hasPages())
<nav class="pagination is-rounded is-centered" role="navigation">
    {{-- Previous Page Link --}} @if ($paginator->onFirstPage())
    <a class="disabled pagination-previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <span aria-hidden="true">&lsaquo;</span>
    </a> @else
    <a>
        <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
    </a>
    @endif {{-- Pagination Elements --}}
    <ul class="pagination-list">
        @foreach ($elements as $element) {{-- "Three Dots" Separator --}} @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif {{-- Array Of Links --}} @if (is_array($element)) @foreach ($element as $page => $url) @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><a class="pagination-link is-current">{{ $page }}</a></li>
        @else
        <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif @endforeach @endif @endforeach {{-- Next Page Link --}}
    </ul>
    @if ($paginator->hasMorePages())
    <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>    @else
    <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <span aria-hidden="true">&rsaquo;</span>
    </a> @endif
</nav>
@endif