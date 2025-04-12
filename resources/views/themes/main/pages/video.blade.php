@extends('layouts.frontend')

@section('title', 'Ekibimiz | RE/MAX Loca')
@section('content')

    <main class="main-field relative pt-[134px] sm:pt-[124px]">

        <section class="breadcrumb-field px-7.5 md:px-5">
            <div
                class="inner rounded-6 md:rounded-3 relative overflow-hidden isolate translate-z-0 py-28 2xl:py-24 xl:py-20 lg:py-16 md:py-12">
                <div class="background-wrapper absolute left-0 top-0 w-full h-full bg-tertiary-950">
                    <img class="full-cover opacity-15" src="{{ asset('image/photo/3.webp') }}" alt="" loading="lazy">
                </div>
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5 relative z-2 grid gap-6 xl:gap-5 lg:gap-4 sm:gap-3">
                    <div class="title-wrapper flex items-center justify-center gap-4 xl:gap-3 md:gap-2">
                        <h1
                            class="title text-center font-semibold text-white text-11 2xl:text-10 xl:text-8 lg:text-7 md:text-6 sm:text-5.5 tracking-[0.15em] lg:tracking-widest sm:tracking-wider leading-tight">
                            LOCA</h1>
                        <img class="w-14 2xl:w-13 xl:w-12 lg:w-11 md:w-8 sm:w-6 aspect-square object-contain object-center block pointer-events-none"
                            src="{{ asset('image/static/1.webp') }}" alt="" loading="lazy">
                    </div>
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
                            #eskiusulemlakçılığason</div>
                        <!--<a href="javascript:void(0)" class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0] hover:text-white">#eskiusulemlakçılığason</a>-->
                    </div>
                </div>
            </div>
        </section>
        <section class="content-field py-15 2xl:py-14 xl:py-13 lg:py-12 md:py-11 sm:py-10">
            <div
                class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 grid grid-cols-[minmax(0,215px)_minmax(0,auto)] gap-7 md:grid-cols-1">
                <div class="sidebar-wrapper">
                    <button
                        class="filter-trigger button group/button hidden md:flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-16 xl:h-14 md:h-12 w-full px-8 sm:px-6 bg-main-900 hover:bg-main-950 text-white"
                        data-show-text="Filtreleri Göster" data-hide-text="Filtreleri Gizle">
                        <div class="icon-wrapper relative">
                            <div
                                class="icon icon-filter text-4 h-4 block leading-none duration-300 text-white group-[&.active]/button:-rotate-45 group-[&.active]/button:opacity-0">
                            </div>
                            <div
                                class="icon icon-filter-out text-5 h-5 block leading-none duration-300 text-white absolute left-1/2 top-1/2 -translate-x-45/100 -translate-y-60/100 opacity-0 rotate-45 group-[&.active]/button:opacity-100 group-[&.active]/button:rotate-0">
                            </div>
                        </div>
                        <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">Filtreleri Göster</div>
                    </button>
                    <div class="filter-wrapper sticky-el sticky top-0 duration-300 md:mt-7.5 md:hidden md:[&.active]:block">
                        <div class="category-list bg-white rounded-5 md:rounded-3 px-4 py-7">
                            <div class="title px-3 text-4 font-semibold text-tertiary-950">{{ __('general.categories') }}
                            </div>
                            <div class="split my-4 w-full h-px bg-[#8AA5D3]/15"></div>
                            <div class="list-wrapper grid gap-4 px-3" x-data="{
                                filters: [],
                                filterCategory() {
                                    const vals = this.filters.join(',')
                                    if (vals == '') {
                                        return;
                                    }
                                    url = '{{ request()->fullUrl() }}';
                                    if (!url.includes('category')) {
                                        window.location.href = url + '?category=' + vals
                                        return
                                    }

                                    window.location.href = url + ',' + vals
                                    this.filters = '{{ json_encode($filters) }}'
                                },

                            }" x-effect="filterCategory()">
                                @foreach ($categories as $category)
                                    <div class="custom-checkbox relative flex items-center gap-2.5">
                                        <input name="filter[category][]" value="{{ $category->id }}" type="checkbox"
                                            x-model="filters" @checked(in_array($category->id, $filters))
                                            :checked="filters.includes('{{ $category->id }}')"
                                            class="peer absolute left-0 top-0 w-full h-full z-2 cursor-pointer opacity-0">
                                        <div
                                            class="box relative duration-300 w-4 aspect-square shrink-0 rounded-0.75 bg-white border border-solid border-[#8AA5D3]/50 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                        </div>
                                        <div
                                            class="text leading-tight duration-300 text-3.5 font-medium text-[#6D6D6D] [-webkit-text-stroke:0.5px_transparent] peer-checked:text-[#2675FA] peer-checked:[-webkit-text-stroke:0.5px_#2675FA]">
                                            {{ $category->name }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div
                        class="list-wrapper grid grid-cols-3 lg:grid-cols-2 xs:grid-cols-1 gap-x-9 xl:gap-x-8 lg:gap-x-7 gap-y-6">
                        @foreach ($videos as $video)
                            <div>
                                <iframe width="350" height="200" style="border-radius: 10px"
                                    src="{{ str_replace('/watch?v=', '/embed/', $video->url) }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <div
                                    class="title text-center text-4.5 xl:text-4 md:text-3.5 font-semibold text-tertiary-950 leading-tight px-4 pt-4 duration-300 group-hover:text-main-700">
                                    {{ $video->title }}
                                </div>
                            </div>

                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $videos->links('vendor.pagination.loca') }}
        </section>
    </main>
@endsection
