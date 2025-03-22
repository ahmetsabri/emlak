<section id="popup-share-portfolio"
    class="hidden !bg-white !rounded-6 md:!rounded-3 !m-0 !p-0 !max-w-[620px] !overflow-x-hidden !isolate w-full">
    <div class="inner w-full">
        <div
            class="heading flex items-center justify-between gap-7.5 px-11 2xl:px-10 xl:px-8 lg:px-6 pt-11 2xl:pt-10 xl:pt-8 lg:pt-6 pb-6">
            <div class="title text-4 font-medium text-[#2675FA]">{{ __('general.share') }}</div>
            <div
                class="custom-fancybox-close-button group cursor-pointer relative before:absolute before:w-7.5 before:aspect-square before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2">
                <div
                    class="icon icon-cross text-3 h-3 block leading-none duration-300 text-tertiary-950 group-hover:rotate-90 group-hover:text-[#2675FA]">
                </div>
            </div>
        </div>
        <div
            class="info-wrapper bg-[#F2F8FD] px-11 2xl:px-10 xl:px-8 lg:px-6 py-6 flex items-center gap-7 sm:flex-col sm:gap-6">
            <div class="image aspect-[52/33] overflow-hidden isolate rounded-3 max-w-[230px] sm:max-w-none w-full">
                <img class="full-cover" src="{{ $portfolio->getOgImage() }}" alt="" loading="lazy">
            </div>
            <div class="naming">
                <div class="name text-4 font-medium text-tertiary-950 mb-1">
                    {{ $portfolio->title }}
                </div>
                <div class="adress flex items-center gap-1">
                    <div class="icon icon-location-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                    </div>
                    <div class="text text-4 text-[#6D6D6D] font-medium leading-tight">{{ $portfolio->full_address }}
                    </div>
                </div>
            </div>
        </div>
        <div
            class="share-wrapper flex-wrap p-11 2xl:p-10 xl:p-8 lg:p-6 flex items-center justify-evenly gap-7.5 sm:gap-4">
            <a target="_blank" href="{{ $portfolio->share_links['wp'] }}" class="item block group">
                <img class="w-7.5 aspect-square object-contain object-center block mx-auto"
                    src="{{ asset('image/icon/1.webp') }}" alt="" loading="lazy">
                <div
                    class="text text-3 sm:text-2.5 font-medium text-tertiary-950 duration-300 group-hover:text-main-600 mt-1.5 leading-tight text-center">
                    Whatsapp</div>
            </a>
            <a target="_blank" href="{{ $portfolio->share_links['fb'] }}" class="item block group">
                <img class="w-7.5 aspect-square object-contain object-center block mx-auto"
                    src="{{ asset('image/icon/2.webp') }}" alt="" loading="lazy">
                <div
                    class="text text-3 sm:text-2.5 font-medium text-tertiary-950 duration-300 group-hover:text-main-600 mt-1.5 leading-tight text-center">
                    Facebook</div>
            </a>
            <a target="_blank" href="{{ $portfolio->share_links['x'] }}" class="item block group">
                <img class="w-7.5 aspect-square object-contain object-center block mx-auto"
                    src="{{ asset('image/icon/3.webp') }}" alt="" loading="lazy">
                <div
                    class="text text-3 sm:text-2.5 font-medium text-tertiary-950 duration-300 group-hover:text-main-600 mt-1.5 leading-tight text-center">
                    X </div>
            </a>
            <a target="_blank" href="{{ $portfolio->share_links['email'] }}" class="item block group">
                <img class="w-7.5 aspect-square object-contain object-center block mx-auto"
                    src="{{ asset('image/icon/4.webp') }}" alt="" loading="lazy">
                <div
                    class="text text-3 sm:text-2.5 font-medium text-tertiary-950 duration-300 group-hover:text-main-600 mt-1.5 leading-tight text-center">
                    E-posta</div>
            </a>
            <a target="_blank" href="{{ $portfolio->share_links['sms'] }}" class="item block group">
                <img class="w-7.5 aspect-square object-contain object-center block mx-auto"
                    src="{{ asset('image/icon/5.webp') }}" alt="" loading="lazy">
                <div
                    class="text text-3 sm:text-2.5 font-medium text-tertiary-950 duration-300 group-hover:text-main-600 mt-1.5 leading-tight text-center">
                    SMS</div>
            </a>
        </div>
        <div class="copy-wrapper px-11 2xl:px-10 xl:px-8 lg:px-6 pb-11 2xl:pb-10 xl:pb-8 lg:pb-6 pt-6 bg-[#F2F8FD]">
            <div class="title text-4 md:text-3.5 font-medium text-[#2675FA] mb-3">
                {{ __('general.copy') }}
            </div>
            <div
                class="link-wrapper bg-white h-14 rounded-4 md:rounded-3 flex items-center justify-between pl-6 pr-1 py-1 gap-6">
                <div class="link w-[calc(100%-72px)] text-3.5 font-medium text-tertiary-950"><span
                        class="line-clamp-1">{{ route('frontend.portfolio.show', $portfolio) }}</span></div>
                <button data-clipboard-text="{{ route('frontend.portfolio.show', $portfolio) }}"
                    class="h-full copy shrink-0 relative copy-link group aspect-square rounded-3 bg-[#E8F0FD] flex items-center justify-center duration-300 hover:bg-main-100">
                    <div class="icon icon-copy text-4 h-4 block leading-none duration-300 text-[#2675FA]"></div>
                    <div
                        class="tooltip bg-[#0B90F3] text-white absolute px-3 leading-none rounded-2 left-1/2 -translate-x-1/2 bottom-[calc(100%+15px)] translate-y-[-5px] pointer-events-none opacity-0 ease-manidar backface-hidden whitespace-nowrap font-medium text-[10px] tracking-[-0.03em] py-[7.5px] group-[&.copied]:translate-y-0 group-[&.copied]:opacity-100 duration-300">
                        {{ __('general.copy') }}
                    </div>
                </button>
            </div>
        </div>
    </div>
</section>
