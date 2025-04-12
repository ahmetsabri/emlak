@extends('layouts.frontend')
@section('title', 'LocaMag | RE/MAX Loca')
@section('content')
    <main class="main-field relative pt-[134px] sm:pt-[124px]">

        <section class="breadcrumb-field px-7 md:px-5">
            <div
                class="inner relative overflow-hidden isolate bg-[#8AA5D3]/15 rounded-6 md:rounded-4 py-22 2xl:py-20 xl:py-18 lg:py-12 md:py-10">
                <div class="image absolute left-0 top-0 w-full h-full bg-tertiary-950"><img class="full-cover opacity-5"
                        src="{{ asset('image/photo/3.webp') }}" alt="" loading="lazy"></div>
                <div
                    class="wrapper max-w-1440 mx-auto w-full px-7.5 relative z-2 flex items-center justify-between gap-7.5 md:flex-col">
                    <div class="text-editor text-editor-white !gap-2 md:text-center">
                        <h2><strong>LOCA Magazin</strong></h2>
                    </div>
                    <div class="form-outer-wrapper max-w-[300px] w-full">
                        <form action="{{ route('frontend.blog') }}" class="w-full" method="GET">
                            <div class="form-wrapper w-full grid gap-4">
                                <div class="form-el group/form w-full relative">
                                    <input name="search" type="text" placeholder="LOCA Mag’ta ara"
                                        class="h-14 duration-300 bg-[#B8D0F7]/6 backdrop-blur-md rounded-4 w-full placeholder:text-[#B8D0F7] font-medium text-3.5 text-white pl-5.5 pr-18 border border-solid border-[#B8D0F7]/10 hover:border-[#B8D0F7] focus:border-[#B8D0F7] group-[&.error]/form:border-secondary-700">
                                    <button
                                        class="absolute right-1 top-1 h-12 px-4 bg-transparent rounded-3.5 text-[#2675FA] font-semibold text-3.5 hover:bg-white duration-300 cursor-pointer flex items-center justify-center">
                                        <div class="icon icon-search text-4 h-4 block leading-none duration-300"></div>
                                    </button>
                                    <div
                                        class="tooltip text-secondary-700 text-3.5 font-medium mt-1 hidden group-[&.error]/form:block">
                                        Lütfen ilgili alanı doldurunuz.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="list-field py-15 2xl:py-14 xl:py-13 lg:py-12 md:py-11 md:pt-11 sm:py-10">
            <div class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5">
                <div
                    class="list grid grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-5 gap-y-17 2xl:gap-y-15 xl:gap-y-13 lg:gap-y-11 sm:gap-y-9">
                    @foreach ($posts as $post)
                        <a href="{{ route('frontend.post.show', $post) }}" class="block item group">
                            <div class="image aspect-[18/11] rounded-5 md:rounded-3 overflow-hidden isolate translate-z-0">
                                <img class="full-cover group-hover:scale-105 duration-450 translate-z-0"
                                    src="{{ $post->media->first()?->original_url }}" alt="" loading="lazy">
                            </div>
                            <div class="content px-5 pt-5">
                                <div class="date text-[#5D5D5D] flex items-center gap-2 mb-2">
                                    <div class="icon icon-date text-3.5 h-3.5 block leading-none duration-300"></div>
                                    <div class="text text-3.5 font-medium">{{ $post->created_at->format('d-m-Y') }}</div>
                                </div>
                                <div
                                    class="title text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold text-tertiary-950 duration-300 group-hover:text-main-700 leading-tight">
                                    {{ $post->title }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    {{ $posts->links('vendor.pagination.loca') }}
                </div>
            </div>
        </section>

    </main>
@endsection
