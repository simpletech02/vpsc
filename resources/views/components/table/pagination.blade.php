<div class="row justify-content-between align-items-center">
    <div class="col-6 col-lg-2 pb-4 pb-lg-0">
        <div class="drop-down-number d-flex align-items-center">
            <span>View</span>
            <select class="form-select" wire:model="view" aria-label="Select entries for page">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
            <div
                class="col-12 col-lg-7 order-3 order-lg-0 pt-4 pb-lg-0 border-sm"
            >
                <div class="list-container">
                    <ul class="d-flex align-items-center justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="btn" aria-hidden="true">
                                    <img src="{{asset('img/triangle-left 1.svg')}}" alt="Previous disabled" />
                                </span>
                            </li>
                        @else
                            <li class="arrow-left">
                                <button type="button" class="btn" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">
                                    <img src="{{asset('img/triangle-left 1.svg')}}" alt="Previous" />
                                </button>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="disabled" aria-disabled="true">
                                    <span class="">{{ $element }}</span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page">
                                            <a href="" class="btn active">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                                            <button type="button" class="btn" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                                                {{ $page }}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li>
                                <button class="btn" type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                                    <img src="{{asset('img/triangle-right 1.svg')}}" alt="Next" />
                                </button>
                            </li>
                        @else
                            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="btn" class="page-link" aria-hidden="true">
                                    <img src="{{asset('img/triangle-right 1.svg')}}" alt="Next disabled" />
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-6 col-lg-3 pb-4 pb-lg-0">
                <div
                    class="page-number d-flex justify-content-end align-items-center"
                >
                    <span>Go to page</span>
                    <input class="form-control" wire:model.defer="selectedPage" type="text" />
                    <button wire:click.prevent="goToSelectedPage">Go</button>
                </div>
            </div>
    @endif
</div>
