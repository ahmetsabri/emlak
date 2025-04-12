@extends('layouts.frontend')

@section('title', 'Hakkımızda | RE/MAX Loca')
@section('content')
    <main class="main-field relative pt-[134px] sm:pt-[124px]">

        <section class="breadcrumb-field px-7.5 md:px-5">
            <div
                class="inner rounded-6 md:rounded-3 relative overflow-hidden isolate translate-z-0 py-28 2xl:py-24 xl:py-20 lg:py-16 md:py-12">
                <div class="background-wrapper absolute left-0 top-0 w-full h-full bg-tertiary-950">
                    <img class="full-cover opacity-15" src="{{ asset('image/photo/3.webp') }}" alt="" loading="lazy">
                </div>
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5 relative z-2 grid gap-6 xl:gap-5 lg:gap-4 sm:gap-3">
                    <h1
                        class="title text-center font-semibold text-white text-11 2xl:text-10 xl:text-8 lg:text-7 md:text-6 sm:text-5.5 tracking-[0.15em] lg:tracking-widest sm:tracking-wider leading-tight">
                        {{ __('general.about') }}
                    </h1>
                    <div
                        class="tags flex items-center justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 sm:gap-x-2 gap-y-2 md:gap-y-1.5 sm:gap-y-0.5">
                        <div
                            class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                            #LOCAdaYeriniAL</div>
                        <!--<a href="javascript:void(0)" class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0] hover:text-white">#LOCAdaYeriniAL</a>-->
                        <div
                            class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                            #LocaFarkYaratır</div>
                        <!--<a href="javascript:void(0)" class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0] hover:text-white">#LocaFarkYaratır</a>-->
                        <div
                            class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                            #EskiUsulEmlakçılığaSon</div>
                        <!--<a href="javascript:void(0)" class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0] hover:text-white">#eskiusulemlakçılığason</a>-->
                        <div
                            class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                            #SizinİçinEnİyisiLOCA</div>
                        <!--<a href="javascript:void(0)" class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0] hover:text-white">#SizinİçinEnİyisiLOCA</a>-->
                    </div>
                </div>
            </div>
        </section>
        <section class="content-field py-20 2xl:py-16 xl:py-14 lg:py-12 md:py-11 sm:py-10">
            <div
                class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 grid grid-cols-2 sm:grid-cols-1 items-center gap-24 2xl:gap-20 xl:gap-16 lg:gap-12 md:gap-8">
                <div class="text-wrapper sm:order-2">
                    <div class="text-editor text-editor-main">
                        <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                        <h3><strong>
                                {{ $about?->title_1 }}</strong></h3>
                        <h6 style="color:#6D6D6D">
                            {!! $about?->description_1 !!}
                        </h6>

                    </div>
                </div>
                <div class="image-wrapper sm:order-1">
                    <div class="inner relative max-w-[500px] sm:max-w-none mr-0 ml-auto">
                        <div
                            class="image rounded-15 2xl:rounded-13 xl:rounded-11 lg:rounded-9 md:rounded-7 sm:rounded-5 overflow-hidden isolate aspect-square sm:aspect-16/10 xs:aspect-5/4 w-full h-auto">
                            <img class="full-cover" src="{{ asset('image/photo/15.webp') }}" alt="" loading="lazy">
                        </div>
                        <div
                            class="logo-wrapper absolute aspect-square w-64 2xl:w-54 xl:w-44 lg:w-36 md:w-24 md:hidden rounded-5 xl:rounded-3 overflow-hidden isolate z-2 left-0 bottom-0 -translate-x-30/100 translate-y-20/100">
                            <img class="full-cover" src="{{ asset('image/static/3.webp') }}" alt="" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-field py-20 2xl:py-16 xl:py-14 lg:py-12 md:py-11 sm:pt-0 sm:pb-10">
            <div
                class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 grid grid-cols-2 sm:grid-cols-1 items-center gap-36 2xl:gap-30 xl:gap-24 lg:gap-20 md:gap-16 sm:gap-8">
                <div class="image-wrapper relative sm:grid sm:grid-cols-2 sm:gap-5">
                    <div
                        class="image rounded-15 2xl:rounded-13 xl:rounded-11 lg:rounded-9 md:rounded-7 sm:rounded-5 overflow-hidden isolate aspect-[127/85] w-full h-auto sm:aspect-[5/4]">
                        <img class="full-cover" src="{{ __('image/photo/16.webp') }}" alt="" loading="lazy">
                    </div>
                    <div
                        class="image absolute right-0 bottom-0 translate-x-20/100 translate-y-20/100 max-w-[285px] 2xl:max-w-[250px] xl:max-w-[200px] md:max-w-[150px] sm:max-w-none rounded-15 2xl:rounded-13 xl:rounded-11 lg:rounded-9 md:rounded-7 sm:rounded-5 overflow-hidden isolate aspect-square w-full h-auto sm:aspect-5/4 sm:relative sm:translate-x-0 sm:translate-y-0 sm:right-auto sm:bottom-auto">
                        <img class="full-cover" src="{{ __('image/photo/14.webp') }}" alt="" loading="lazy">
                    </div>
                </div>
                <div class="text-wrapper">
                    <div class="text-editor text-editor-main">
                        <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                        <blockquote>
                            <h3><strong>{{ $about?->quote }}</strong></h3>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-field py-20 2xl:py-16 xl:py-14 lg:py-12 md:py-11 sm:pt-0 sm:pb-10">
            <div class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 relative">
                <img class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 max-w-full w-auto h-auto"
                    src="{{ asset('image/static/7.webp') }}" alt="" loading="lazy">
                <div
                    class="text-editor text-editor-main max-w-768 mx-auto relative z-2 py-30 2xl:py-24 xl:py-20 lg:py-16 md:py-12 sm:py-8 xs:py-4">
                    <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                    <h3 style="text-align:center;"><strong>{{ $about?->title_2 }}</strong></h3>
                    <h6 style="color:#6D6D6D;text-align:center;">
                        {!! $about?->description_2 !!}</h6>
                </div>
            </div>
        </section>

    </main>
@endsection
