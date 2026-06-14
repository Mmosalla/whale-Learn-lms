@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="mt-4 d-flex justify-content-center">


            <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">


                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-right"></i></a></li>
                            @else

                                <li wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-right"></i></a></li>
                            @endif


                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                               <li class="page-item mb-0 active" aria-current="page"><a class="page-link" href="#">{{ $element }}</a></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <li class="page-item mb-0 active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                                        @else
                                            <li wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="page-item mb-0 cursor-pointer" aria-current="page"><a class="page-link cursor-pointer" >{{ $page }}</a></li>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach


                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <li wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            @else
                                <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            @endif


            </ul>
        </nav>
    @endif
</div>
