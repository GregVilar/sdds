<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
    <span class="page-item disabled" aria-disabled="true">
        <span class="page-link">@lang('pagination.previous')</span>
    </span>
@else
    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
@endif

<!-- Pagination Elements -->
<!-- ... -->

<!-- Next Page Link -->
@if ($paginator->hasMorePages())
    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
@else
    <span class="page-item disabled" aria-disabled="true">
        <span class="page-link">@lang('pagination.next')</span>
    </span>
@endif
