@extends('layouts.frontend')

@section('title', $portfolio->title)
@section('content')
    <soho-technologies class="block">

        <main class="main-field relative pt-[134px] sm:pt-[124px]">

            <section class="breadcrumb-field px-7 md:px-5">
                <div class="inner bg-[#8AA5D3]/15 rounded-6 md:rounded-4 py-24 2xl:py-20 xl:py-16 lg:py-12 md:py-10">
                    <div
                        class="wrapper max-w-1440 mx-auto w-full px-7.5 flex items-center justify-between md:flex-col md:items-start gap-7.5 md:gap-6">
                        <div class="text-wrapper">
                            <h1 class="title text-6 2xl:text-5.5 xl:text-4.5 font-semibold text-tertiary-950 leading-tight">

                                {{ $portfolio->title }}
                            </h1>
                            <div class="location flex items-center gap-2 mt-3">
                                <div
                                    class="icon icon-location-1 text-4 h-4 xl:text-3.5 xl:h-3.5 block leading-none text-[#2675FA]">
                                </div>
                                <div class="text text-[#888888] font-medium text-4 xl:text-3.5">
                                    {{ $portfolio->district->county->province->name }}/{{ $portfolio->district->county->name }}
                                    , {{ $portfolio->district->name }}
                                </div>
                            </div>
                        </div>
                        <div class="buttons-wrapper flex items-center gap-5 md:gap-4 sm:gap-3 xs:gap-2 flex-wrap">
                            <a href="javascript:void(0)"
                                class="button add-favorite group/button h-12 md:h-11 sm:h-10 px-5 md:px-4 sm:px-3.5 rounded-3 border border-solid border-black/13 flex items-center justify-center gap-3 sm:gap-2 duration-300 hover:border-black/25">
                                <div class="icon-wrapper relative">
                                    <div
                                        class="icon icon-like text-3.5 h-3.5 sm:text-3 sm:h-3 block leading-none duration-300 text-[#454545]">
                                    </div>
                                    <div
                                        class="icon icon-liked text-3.5 h-3.5 sm:text-3 sm:h-3 block leading-none duration-300 text-[#DC1C2E] absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover/button:opacity-100 group-[&.favorited]/button:opacity-100">
                                    </div>
                                </div>
                                <div class="text text-[#454545] text-3.5 sm:text-3 font-medium">
                                    <span class="block group-[&.favorited]/button:hidden">Favori Yap</span>
                                    <span class="hidden group-[&.favorited]/button:block">Favoriden Kaldır</span>
                                </div>
                            </a>
                            <a href="#popup-share-portfolio"
                                class="button add-favorite group/button h-12 md:h-11 sm:h-10 px-5 md:px-4 sm:px-3.5 rounded-3 border border-solid border-black/13 flex items-center justify-center gap-3 sm:gap-2 duration-300 hover:border-black/25"
                                data-fancybox>
                                <div
                                    class="icon icon-share text-3.5 h-3.5 sm:text-3 sm:h-3 block leading-none duration-300 text-[#454545]">
                                </div>
                                <div class="text text-[#454545] text-3.5 sm:text-3 font-medium">{{ __('general.share') }}
                                </div>
                            </a>
                            <a x-data="{}" @click="window.print()"
                                class="button add-favorite group/button h-12 md:h-11 sm:h-10 px-5 md:px-4 sm:px-3.5 rounded-3 border border-solid border-black/13 flex items-center justify-center gap-3 sm:gap-2 duration-300 hover:border-black/25">
                                <div
                                    class="icon icon-download text-3.5 h-3.5 sm:text-3 sm:h-3 block leading-none duration-300 text-[#454545]">
                                </div>
                                <div class="text text-[#454545] text-3.5 sm:text-3 font-medium">Broşür</div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content-field py-15 2xl:py-14 xl:py-13 lg:pt-12 md:pt-11 sm:pt-10 lg:pb-0">
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5">
                    <div
                        class="content-wrapper grid grid-cols-[minmax(0,auto)_minmax(0,450px)] xl:grid-cols-[minmax(0,auto)_minmax(0,400px)] lg:grid-cols-[minmax(0,auto)_minmax(0,350px)] md:grid-cols-[minmax(0,auto)_minmax(0,300px)] sm:grid-cols-1 gap-10 lg:gap-8 sm:gap-0">
                        <div class="inner-wrapper sm:contents">
                            <div
                                class="image-outer-wrapper relative grid gap-3 mb-18 2xl:mb-15 xl:mb-12 lg:mb-10 md:mb-8 sm:order-1">
                                <div class="image-inner-wrapper flex relative w-full h-auto aspect-[15/8] xs:aspect-[5/4]">
                                    <a href="{{ $portfolio->getOgImage() }}"
                                        class="image block aspect-[15/8] w-full h-full xs:aspect-[5/4] overflow-hidden isolate rounded-6 md:rounded-3 translate-z-0 group"
                                        data-fancybox="gallery"><img
                                            class=" full-cover translate-z-0 group-hover:scale-105 duration-450"
                                            src="{{ $portfolio->getOgImage() }}" alt="" loading="lazy"></a>
                                    <div
                                        class="button-wrapper absolute bottom-0 right-0 lg:bottom-auto lg:top-0 p-4 flex items-center gap-2">
                                        <a href="{{ $portfolio->getLastImage() }}" data-fancybox="gallery"
                                            class="button group/button bg-white h-12 md:h-11 sm:h-10 px-5 md:px-4 sm:px-3.5 rounded-3 flex items-center justify-center gap-3 sm:gap-2 duration-300 hover:bg-main-50">
                                            <div class="text text-[#454545] text-3.5 sm:text-3 font-medium">Tüm Fotoğraflar
                                            </div>
                                        </a>
                                        {{-- TODO --}}
                                        {{-- @if ($portfolio->promotion_url)
                                            <a href="{{ $portfolio->promotion_url }}" data-fancybox
                                                class="button group/button bg-white h-12 md:h-11 sm:h-10 px-5 md:px-4 sm:px-3.5 rounded-3 flex items-center justify-center gap-3 sm:gap-2 duration-300 hover:bg-main-50">
                                                <div class="text text-[#454545] text-3.5 sm:text-3 font-medium">Tanıtımı
                                                    İzle
                                                </div>
                                            </a>
                                        @endif --}}
                                    </div>
                                </div>
                                @include('portfolio.share', ['portfolio' => $portfolio])

                                <div class="image-inner-wrapper grid grid-cols-4 gap-3" x-data>
                                    @foreach ($portfolio->media as $image)
                                        <a x-show="`{{ $loop->iteration < 5 }}`" href="{{ $image->original_url }}"
                                            class="image block aspect-[64/57] overflow-hidden isolate rounded-6 md:rounded-3 translate-z-0 group"
                                            data-fancybox="gallery"><img
                                                class="full-cover translate-z-0 group-hover:scale-105 duration-450"
                                                src="{{ $image->original_url }}" alt="" loading="lazy"></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="item grid grid-cols-2/10 lg:grid-cols-1 gap-6 sm:order-3 sm:mt-6">
                                <div
                                    class="title text-4.5 xl:text-4 md:text-3.5 font-semibold text-tertiary-950 capitalize">
                                    {{ __('general.description') }}
                                </div>
                                <div class="detail">
                                    <div class="text-editor text-editor-main">
                                        <p>
                                            {!! $portfolio->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="split h-px w-full bg-black/11 my-10 xl:my-8 lg:my-6 sm:order-4"></div>
                            <div class="item grid grid-cols-5/10 lg:grid-cols-1 gap-6 sm:order-5">
                                @foreach ($portfolio->features->groupBy('group.name') as $featureName => $features)
                                    <div class="item grid grid-cols-2/10 lg:grid-cols-1 gap-6">
                                        <div
                                            class="title text-4.5 xl:text-4 md:text-3.5 font-semibold text-tertiary-950 capitalize">
                                            {{ $featureName }}
                                        </div>
                                        <div class="detail">
                                            <div
                                                class="custom-list grid grid-cols-2 xs:grid-cols-1 gap-6 xl:gap-5 lg:gap-4 md:gap-3 sm:gap-2 xs:gap-1.5">
                                                @foreach ($features as $feature)
                                                    <div class="item flex items-center gap-3">
                                                        <div
                                                            class="dot w-1.5 sm.w-1 aspect-square rounded-full bg-tertiary-950 shrink-0">
                                                        </div>
                                                        <div
                                                            class="text capitalize font-medium text-4.5 xl:text-4 md:text-3.5 text-tertiary-950">
                                                            {{ $feature->option?->name ?? $feature->name }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="split h-px w-full bg-black/11 my-10 xl:my-8 lg:my-6 sm:order-6"></div>

                            <div class="item sm:order-9">
                                <div
                                    class="heading-wrapper mb-6 flex items-center justify-between gap-7.5 sm:flex-col sm:items-start sm:gap-3">
                                    <div
                                        class="title text-4.5 xl:text-4 md:text-3.5 font-semibold text-[#2675FA] capitalize">

                                        {{ __('general.location') }}
                                    </div>
                                    <div class="button-wrapper flex items-center gap-3">
                                    </div>
                                </div>
                                <div class="detail" style="width: 100%">
                                    @include('portfolio.single_map', ['model' => $portfolio])
                                </div>
                            </div>
                            <div class="split h-px w-full bg-black/11 my-10 xl:my-8 lg:my-6 sm:order-10"></div>

                            <div
                                class="item bg-white rounded-6 md:rolunded-3 p-6 grid grid-cols-4/8 md:grid-cols-2 sm:grid-cols-1 gap-18 2xl:gap-15 xl:gap-11 lg:gap-8 md:gap-6 sm:order-11">
                                <div class="info-wrapper">
                                    <div class="image aspect-[3/4] overflow-hidden isolate rounded-3 w-full"><img
                                            class="full-cover" src="{{ $portfolio->user->media?->first()?->original_url }}"
                                            alt="" loading="lazy"></div>
                                    <div class="naming mt-6 md:mt-5 sm:mt-4">
                                        <div
                                            class="name text-center text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 text-tertiary-950 font-semibold">
                                            {{ $portfolio->user->name }}
                                        </div>
                                        <div class="position text-4 xl:text-3.5 text-center text-[#6D6D6D] font-medium">
                                            {{ $portfolio->user->title }}
                                        </div>
                                    </div>
                                    <div
                                        class="id text-4 xl:text-3.5 text-center text-[#6D6D6D] font-medium mt-4 md:mt-3 sm:mt-2">
                                        <strong>TTYB NO:</strong> {{ $portfolio->user->ttyb_no }}
                                    </div>
                                    <div class="button-wrapper flex items-center justify-center mt-4 md:mt-3 sm:mt-2 gap-2">
                                        <a target="_blank" href="{{ $portfolio->user->wp_url }}"
                                            class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-11 w-fit px-5 !gap-2 !rounded-3 bg-[#65CF70] hover:bg-[#5cbf66] text-white !font-medium">
                                            <div class="icon icon-whatsapp-2 text-3.5 h-3.5 block leading-none"></div>
                                            <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">Whatsapp
                                            </div>

                                        </a> <a target="_blank" href="tel:{{ $portfolio->user->phone }}"
                                            class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-11 shrink-0 px-5.5 !rounded-3 bg-[#224391] hover:bg-main-800 text-white">
                                            <div class="icon icon-phone text-3.5 h-3.5 block leading-none"></div>


                                        </a>
                                    </div>
                                </div>
                                <div class="form-wrapper p-6 2xl:p-5 xl:p-4 lg:p-3 md:p-0">
                                    <div
                                        class="title text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 text-tertiary-950 font-semibold mb-5">
                                        Danışmanımıza Ulaşın</div>
                                    <form action="{{ route('form.portfolio') }}" method="post">
                                        @csrf
                                        <div class="form-wrapper grid gap-3">
                                            <div class="form-el relative group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <input name="name" type="text"
                                                    placeholder="{{ __('general.name') }}"
                                                    class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el relative group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <input required name="email" type="email"
                                                    placeholder="{{ __('general.email') }}"
                                                    class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el relative group/form w-full">
                                                <input hidden name="real_estate_id" value="{{ $portfolio->id }}" />
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <input required name="phone" type="tel"
                                                    placeholder="{{ __('general.phone') }}"
                                                    class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div
                                                class="form-el group/form w-full [&amp;_textarea]:!h-40 md:[&amp;_textarea]:!h-30">

                                                <textarea required name="message" placeholder="{{ __('general.message') }}"
                                                    class="w-full h-28 md:h-20 duration-300 rounded-4 md:rounded-3 p-7 md:p-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700"></textarea>
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div
                                                class="form-inner-wrapper flex items-center gap-7.5 lg:flex-col lg:gap-3 lg:items-start">
                                                <div class="form-el group/form w-full">
                                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                    <div class="custom-input relative flex items-center gap-2">
                                                        <input required type="checkbox"
                                                            class="opacity-0 absolute left-0 top-0 w-full h-full peer z-2 cursor-pointer">
                                                        <div
                                                            class="box relative duration-300 w-4 aspect-square shrink-0 bg-bodyColor rounded-0.75 border border-solid border-[#8AA5D3]/30 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                                        </div>
                                                        <div class="text text-[#6D6D6D] text-3.5 font-medium"><a
                                                                href="#popup-gdpr" data-fancybox
                                                                class="text-[#6D6D6D] font-semibold duration-300 hover:text-main-700 relative z-3">KVKK</a>
                                                            ve <a href="#popup-gdpr" data-fancybox
                                                                class="text-[#6D6D6D] font-semibold duration-300 hover:text-main-700 relative z-3">Gizlilik
                                                                Şartları</a>’nı okudum, kabul ediyorum.</div>
                                                    </div>
                                                    <div
                                                        class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                        Lütfen ilgili alanı doldurunuz.</div>
                                                </div>
                                                <div class="form-el group/form w-fit lg:w-full">
                                                    <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                                    <button type="submit"
                                                        class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none h-16 xl:h-14 md:h-12 w-full px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">

                                                        <div
                                                            class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                                            {{ __('general.submit') }}</div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-wrapper sm:order-2">
                            <div class="sticky-el sticky top-0 duration-300">
                                <div class="inner bg-[#8AA5D3]/15 rounded-4 md:rounded-3 p-7.5 sm:p-6">
                                    <div class="price text-5 font-semibold text-[#224391] px-1.5 mb-4">
                                        {{ $portfolio->price_in_try }} ₺</div>
                                    <div class="list">
                                        <div class="row flex items-center justify-between gap-7.5 px-1.5 leading-tight">
                                            <div class="title text-3.5 font-medium text-tertiary-950">
                                                {{ __('general.ad_no') }}</div>
                                            <div class="value text-3.5 font-semibold text-tertiary-950 text-right">
                                                {{ $portfolio->ad_number }}
                                            </div>
                                        </div>

                                        <div class="split w-full h-px bg-[#8AA5D3]/30 my-2"></div>
                                        <div class="row flex items-center justify-between gap-7.5 px-1.5 leading-tight">
                                            <div class="title text-3.5 font-medium text-tertiary-950">
                                                {{ __('general.province') }} / {{ __('general.town') }}</div>
                                            <div class="value text-3.5 font-semibold text-tertiary-950 text-right">
                                                {{ $portfolio->district->county->province->name }}/{{ $portfolio->district->county->name }}
                                                , {{ $portfolio->district->name }}
                                            </div>
                                        </div>
                                        <div class="split w-full h-px bg-[#8AA5D3]/30 my-2"></div>
                                        <div class="row flex items-center justify-between gap-7.5 px-1.5 leading-tight">
                                            <div class="title text-3.5 font-medium text-tertiary-950">
                                                {{ __('general.price') }} </div>
                                            <div class="value text-3.5 font-semibold text-tertiary-950 text-right">
                                                {{ $portfolio->price }}
                                            </div>
                                        </div>
                                        @foreach ($portfolio->infos as $info)
                                            <div class="split w-full h-px bg-[#8AA5D3]/30 my-2"></div>
                                            <div
                                                class="row flex items-center justify-between gap-7.5 px-1.5 leading-tight">
                                                <div class="title text-3.5 font-medium text-tertiary-950 capitalize">
                                                    {{ $info->name }}
                                                </div>
                                                <div
                                                    class="value text-3.5 font-semibold text-tertiary-950 text-right capitalize">
                                                    {{ $info->pivot->value }}
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- @foreach ($portfolio->options as $option)
                                            <div class="split w-full h-px bg-[#8AA5D3]/30 my-2"></div>
                                            <div
                                                class="row flex items-center justify-between gap-7.5 px-1.5 leading-tight">
                                                <div class="title text-3.5 font-medium text-tertiary-950 capitalize">
                                                    {{ $option->info->name }}
                                                </div>
                                                <div
                                                    class="value text-3.5 font-semibold text-tertiary-950 text-right capitalize">
                                                    {{ $option->option->name }}
                                                </div>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="portfolio-field py-20 2xl:py-16 xl:py-12 lg:py-8">
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5">
                    <div class="text-editor text-editor-main">
                        <h3 style="text-align:center;"><strong>{{ __('general.more') }}</strong></h3>
                    </div>
                    <div
                        class="list my-18 2x:my-15 xl:my-12 lg:my-9 md:my-7.5 grid grid-cols-3 lg:grid-cols-2 sm:grid-cols-1 gap-x-9 xl:gap-x-8 lg:gap-x-7 gap-y-6">


                        @foreach ($randomPortfolios as $rportfolio)
                            <div
                                class="portfolio group/item p-2.5 bg-white rounded-6 md:rounded-3 border border-solid border-transparent hover:border-[#8AA5D3]/35 duration-300">
                                <div class="carousel-wrapper w-full">
                                    <div
                                        class="portfolio-images-carousel w-full relative swiper !h-auto shadow-s3 rounded-6 md:rounded-3 overflow-hidden isolate">
                                        <div class="swiper-wrapper !h-auto">
                                            @foreach ($rportfolio->images as $image)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('frontend.portfolio.show', $rportfolio) }}"
                                                        class="image group block aspect-[36/25] overflow-hidden isolate translate-z-0"><img
                                                            class="full-cover group-hover:scale-105 duration-450 translate-z-0 pointer-events-none"
                                                            src="{{ $image->full_url }}" alt=""
                                                            loading="lazy"></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div
                                            class="portfolio-images-next flex items-center justify-center cursor-pointer z-5 absolute right-5.5 top-1/2 -translate-y-1/2 w-7 aspect-square rounded-full bg-white text-tertiary-950 [&:not(.swiper-button-disabled):hover]:bg-main-700 [&:not(.swiper-button-disabled):hover]:text-white duration-300 [&.swiper-button-disabled]:cursor-default min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                            <div class="icon icon-chevron-right text-2 h-2 block leading-none"></div>
                                        </div>
                                        <div
                                            class="portfolio-images-prev flex items-center justify-center cursor-pointer z-5 absolute left-5.5 top-1/2 -translate-y-1/2 w-7 aspect-square rounded-full bg-white text-tertiary-950 [&:not(.swiper-button-disabled):hover]:bg-main-700 [&:not(.swiper-button-disabled):hover]:text-white duration-300 [&.swiper-button-disabled]:cursor-default min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                            <div class="icon icon-chevron-left text-2 h-2 block leading-none"></div>
                                        </div>
                                        <div
                                            class="portfolio-images-pagination duration-300 !flex items-center justify-center gap-3 absolute !left-1/2 -translate-x-1/2 !bottom-5.5 z-5 !w-fit !right-auto !top-auto [&_span]:w-2 [&_span]:h-2 [&_span]:!m-0 [&_span]:!p-0 [&_span]:opacity-100 [&_span]:bg-white/40 [&_span:hover]:bg-white [&_span]:duration-300 [&_span.swiper-pagination-bullet-active]:pointer-events-none [&_span.swiper-pagination-bullet-active]:bg-white min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                        </div>
                                        <div
                                            class="tag absolute left-4 top-4 bg-tertiary-950/50 rounded-2 px-2 py-1.5 text-white text-3 font-medium leading-none z-5 capitalize">
                                            {{ $rportfolio->category?->rootAncestor?->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="content-wrapper p-5 lg:p-4 mt-2.5">
                                    <div class="item flex items-center gap-2 mb-2">
                                        <div
                                            class="icon icon-location-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                        </div>
                                        <div class=" text-3.5 font-medium text-tertiary-950/40 capitalize">
                                            {{ $rportfolio->district->county->province->name }}/{{ $rportfolio->district->county->name }}
                                            , {{ $rportfolio->district->name }}
                                        </div>
                                    </div>
                                    <a href="{{ route('frontend.portfolio.show', $rportfolio) }}"
                                        class="title text-4.5 leading-tight text-tertiary-950 hover:text-main-700 duration-300 font-semibold mb-4 xl:mb-5 md:mb-4 block capitalize">{{ $rportfolio->title }}</a>
                                    <div class="price text-[#2675FA] font-semibold text-5 lg:text-4.5 md:text-4">
                                        {{ $rportfolio->price }}
                                    </div>
                                    <div class="info flex items-center justify-between gap-7.5 mt-5 md:mt-4">
                                        <div
                                            class="tags flex flex-wrap items-center gap-8 2xl:gap-7 xl:gap-6 lg:gap-5 md:gap-4 sm:gap-3">


                                        </div>
                                        <button
                                            class="button shrink-0 add-favorite group/button relative duration-300 bg-[#EFF5FF] flex items-center justify-center h-10 aspect-square rounded-full hover:border-tertiary-950/30">
                                            <div
                                                class="icon icon-like text-4 h-4 block leading-none duration-300 text-[#DC1C2E]">
                                            </div>
                                            <div
                                                class="icon icon-liked text-4 h-4 block leading-none duration-300 text-[#DC1C2E] absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover/button:opacity-100 group-[&.favorited]/button:opacity-100">
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('portfolios', ['grid_type' => 'grid']) }}"
                        class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-14 md:h-12 w-fit mx-auto px-14 2xl:px-12 xl:px-10 lg:px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">

                        <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">
                            {{ __('general.show_all') }}
                        </div>

                    </a>
                </div>
            </section>

        </main>

    </soho-technologies>
@endsection
<script>
    @session('success')
    alert('İlginiz için teşekkürler')
    @endsession
</script>
