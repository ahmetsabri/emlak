@extends('layouts.frontend')
@section('content')
    <main class="main-field relative pt-[134px] sm:pt-[124px]">


        <section class="content-field py-15 2xl:py-14 xl:py-13 lg:py-12 md:py-11 md:pt-11 sm:py-10">
            <div class="wrapper max-w-1440 relative mx-auto w-full px-7.5 md:px-5">
                <div class="share-wrapper absolute right-7.5 top-0 h-full md:relative md:right-auto md:top-auto">
                    <div
                        class="sticky-el sticky top-0 duration-300 grid gap-10 xl:gap-7 md:flex md:gap-5 sm:gap-4 md:items-center md:mb-6 sm:mb-5">
                        <a href="{{ $post->share_links['wp'] }}"
                            class="block text-[#AAB0BA] duration-300 hover:text-[#2675FA]">
                            <div
                                class="icon icon-whatsapp-1 text-6 h-6 xl:text-5 xl:h-5 md:text-4 md:h-4 block leading-none">
                            </div>
                        </a>
                        <a href="{{ $post->share_links['fb'] }}"
                            class="block text-[#AAB0BA] duration-300 hover:text-[#2675FA]">
                            <div
                                class="icon icon-facebook-2 text-6 h-6 xl:text-5 xl:h-5 md:text-4 md:h-4 block leading-none">
                            </div>
                        </a>
                        <a href="{{ $post->share_links['x'] }}"
                            class="block text-[#AAB0BA] duration-300 hover:text-[#2675FA]">
                            <div class="icon icon-twitter text-6 h-6 xl:text-5 xl:h-5 md:text-4 md:h-4 block leading-none">
                            </div>
                        </a>
                        <a href="{{ $post->share_links['li'] }}"
                            class="block text-[#AAB0BA] duration-300 hover:text-[#2675FA]">
                            <div
                                class="icon icon-linkedin-2 text-6 h-6 xl:text-5 xl:h-5 md:text-4 md:h-4 block leading-none">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="detail-wrapper max-w-[740px] mx-auto md:max-w-none">
                    <div class="heading-wrapper mb-8 xl:mb-7 lg:mb-6 md:mb-5">
                        <div class="date text-[#5D5D5D] flex items-center gap-2 mb-1">
                            <div class="icon icon-date text-3.5 h-3.5 block leading-none duration-300"></div>
                            <div class="text text-3.5 font-medium">{{ $post->created_at->translatedFormat('d-M-Y') }}</div>
                        </div>
                        <h1
                            class="title text-8 2xl:text-7 xl:text-6 lg:text-5 md:text-4.5 font-semibold text-tertiary-950 leading-tight">
                            {{ $post->title }}
                        </h1>
                    </div>
                    <div class="text-editor text-editor-main">
                        <p>

                        </p>
                        <p>

                            {!! $post->body !!}
                        </p>


                    </div>

                    <a href="{{ route('frontend.blog') }}"
                        class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 !gap-2 h-16 xl:h-14 md:h-12 w-fit px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 mt-7.5 text-white">
                        <div
                            class="icon icon-chevron-left text-2.5 h-2.5 md:text-4 md:h-4 sm:text-3.5 sm:h-3.5 block leading-none">
                        </div>
                        <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">Geri Dön</div>

                    </a>
                </div>
            </div>
        </section>

    </main>
@endsection
