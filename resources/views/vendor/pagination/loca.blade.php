@if ($paginator->hasPages())

    <div class="pagination flex items-center justify-center gap-2.5 flex-wrap mt-17 2xl:mt-15 xl:mt-13 lg:mt-11 md:mt-9">
        <a href="@if ($paginator->onFirstPage()) @else {{ $paginator->previousPageUrl() }} @endif"
            class="flex  duration-300 items-center justify-center w-6.5 aspect-square shrink-0 rounded-1.5 border border-solid border-[#2675FA] text-3.5 font-medium text-tertiary-950 hover:bg-[#2675FA] hover:text-white ">
            <div class="icon icon-chevron-left text-2 h-2 block leading-none"></div>
        </a>

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}"
                        class="flex @if ($page == $paginator->currentPage()) [&.current]:bg-[#2675FA] [&.current]:border-[#2675FA] @endif duration-300 items-center justify-center w-6.5 aspect-square shrink-0 rounded-1.5 border border-solid border-[#8AA5D3]/35 text-3.5 font-medium text-tertiary-950 hover:border-[#2675FA] [&.current]:pointer-events-none  [&.current]:text-white @if ($page == $paginator->currentPage()) current @endif">{{ $page }}</a>
                @endforeach
            @endif
        @endforeach

        <a href="@if ($paginator->onLastPage()) @else {{ request()->fullUrlWithQuery(['page' => $page]) }} @endif"
            class="flex duration-300 items-center justify-center w-6.5 aspect-square shrink-0 rounded-1.5 border border-solid border-[#2675FA] text-3.5 font-medium text-tertiary-950 hover:bg-[#2675FA] hover:text-white">
            <div class="icon icon-chevron-right text-2 h-2 block leading-none"></div>
        </a>
    </div>


@endif
