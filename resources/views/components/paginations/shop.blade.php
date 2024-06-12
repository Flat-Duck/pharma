@if ($paginator->hasPages())
    <section class="page-numbers mb-48">
        <div class="container">
            <div class="page-circles">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="disabled" aria-disabled="true" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <div class="numbering-circle"><i class="far fa-chevron-left"></i></div>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <div class="numbering-circle"><i class="far fa-chevron-left"></i></div>
                    </a>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span>
                            <div class="numbering-circle">
                                <h6>{{ $element }}</h6>
                            </div>
                        </span>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span>
                                    <div class="numbering-circle active" aria-current="page">
                                        <h6>{{ $page }}</h6>
                                    </div>
                                </span>
                            @else
                                <a href="{{ $url }}">
                                    <div class="numbering-circle">
                                        <h6>{{ $page }}</h6>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <div class="numbering-circle"><i class="far fa-chevron-right"></i></div>
                    </a>
                @else
                    <span class="disabled" aria-disabled="true" rel="prev" aria-label="@lang('pagination.next')">
                        <div class="numbering-circle"><i class="far fa-chevron-right"></i></div>
                    </span>
                @endif
            </div>
        </div>
    </section>
@endif
