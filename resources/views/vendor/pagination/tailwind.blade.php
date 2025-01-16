@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="inline-flex -space-x-px text-sm">
            {{-- Tombol "Previous" --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="inline-flex items-center px-4 py-2 ml-0 leading-5 text-gray-400 bg-white border border-gray-300 rounded-l-md cursor-default">
                        {!! __('pagination.previous') !!}
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 ml-0 leading-5 text-gray-700 bg-white border border-gray-300 rounded-l-md hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-300">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Element Pagination --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="inline-flex items-center px-4 py-2 leading-5 text-gray-700 bg-white border border-gray-300 cursor-default">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Link Halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page" class="inline-flex items-center px-4 py-2 leading-5 text-white bg-blue-500 border border-blue-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-300">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 leading-5 text-gray-700 bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-300">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol "Next" --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 leading-5 text-gray-700 bg-white border border-gray-300 rounded-r-md hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-300">
                        {!! __('pagination.next') !!}
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="inline-flex items-center px-4 py-2 leading-5 text-gray-400 bg-white border border-gray-300 rounded-r-md cursor-default">
                        {!! __('pagination.next') !!}
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
