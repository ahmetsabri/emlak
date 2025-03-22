@extends('layouts.frontend')

@section('title', 'Portföyler | RE/MAX Loca')

@section('content')
    <soho-technologies class="block">
        <main class="main-field relative pt-[134px] sm:pt-[124px]" x-data="{
            towns: [],
            selectedTown: `{{ request('filter.town') }}`,
            selectedTownName: '',
            addToFavorites(id) {
                localStorage.setItem(`portfolio_${id}`, id)
            },
            init() {
                if (`{{ request('filter.province') }}`) {
                    this.loadTowns(`{{ route('province.towns', request('filter.province', 1)) }}`)
                }
            },
            sortBy(s) {
                window.location.href = '{{ request()->url() }}?sort=' + s
            },
            loadTowns(url) {
                const self = this
        
                axios.get(url).then((res) => {
                    self.towns = res.data.towns
                    self.selectedTownName = res.data.towns.filter(town => town.id == self.selectedTown)[0]?.name
                }).catch((err) => {
                    console.log(err)
                })
            }
        }">
            <section class="breadcrumb-field px-7.5 md:px-5">
                <div
                    class="inner rounded-6 md:rounded-3 relative overflow-hidden isolate translate-z-0 py-28 2xl:py-24 xl:py-20 lg:py-16 md:py-12">
                    <div class="background-wrapper absolute left-0 top-0 w-full h-full bg-tertiary-950">
                        <img class="full-cover opacity-15" src="{{ asset('image/photo/3.webp') }}" alt=""
                            loading="lazy">
                    </div>
                    <div
                        class="wrapper max-w-1440 mx-auto w-full px-7.5 relative z-2 grid gap-6 xl:gap-5 lg:gap-4 sm:gap-3">
                        <h1
                            class="title text-center font-semibold text-white text-11 2xl:text-10 xl:text-8 lg:text-7 md:text-6 sm:text-5.5 tracking-[0.15em] lg:tracking-widest sm:tracking-wider leading-tight">
                            {{ __('general.portfolios') }}
                        </h1>
                        <div
                            class="tags flex items-center justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 sm:gap-x-2 gap-y-2 md:gap-y-1.5 sm:gap-y-0.5">
                            <div
                                class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                #LOCAdaYeriniAL</div>

                            <div
                                class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                #LocaFarkYaratır</div>

                            <div
                                class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                #eskiusulemlakçılığason</div>
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
                        <form method="GET" action="{{ route('portfolios') }}"
                            class="filter-wrapper sticky-el sticky top-0 duration-300 md:mt-7.5 md:hidden md:[&.active]:block">
                            <div class="sidebar-general-list bg-white rounded-5 md:rounded-3 px-4 py-7">
                                <div class="category-wrapper px-3">
                                    <div class="heading-wrapper">
                                        <a href="{{ route('portfolios') }}"
                                            class="title capitalize text-4 text-[#2675FA] duration-300 font-semibold mb-2">
                                            {{ __('general.categories') }}
                                        </a>
                                        <div class="location-wrapper hidden [&.active]:block">
                                            <div class="location-list flex items-center gap-2 flex-wrap"></div>
                                            <div class="split w-full h-px bg-[#E8F0FD] mb-5 mt-5"></div>
                                        </div>
                                    </div>


                                    @foreach ($rootCategories as $category)
                                        <div data-level="y0"
                                            class="list hidden [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[196px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65
                                    @if (!request('filter.category')) active
                                    @else
                                    @if (in_array(request('filter.category'), $category->children->pluck('id')->merge($category->id)->toArray()))
                                            active @endif
                                    @endif
                                    ">
                                            @if ($category->children->isNotEmpty())
                                                <button type="button" data-destination-level="s{{ $category->id }}"
                                                    class="text-tertiary-950 @if (in_array(request('filter.category'), $category->children->pluck('id')->merge($category->id)->toArray())) active block @endif text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523]  capitalize">
                                                    {{ $category->name }}
                                                </button>
                                            @else
                                                <a href="{{ route('portfolios', ['filter[category]' => $category->id]) }}"
                                                    class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                                    {{ $category->name }}
                                                </a>
                                            @endif

                                        </div>
                                    @endforeach

                                    @foreach ($rootCategories as $category)
                                        <div data-level="s{{ $category->id }}"
                                            class="list hidden   @if (in_array(request('filter.category'), $category->children->pluck('id')->merge($category->id)->toArray())) active @endif [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[153px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65">
                                            @foreach ($category->children as $child)
                                                @if ($child->children->isNotEmpty())
                                                    <button type="button" data-destination-level="k{{ $child->id }}"
                                                        class="text-tertiary-950 text-3.5 w-fit font-medium draw-underline active [--line-color:#0D1523] block">
                                                        {{ $child->name }}
                                                    </button>
                                                @else
                                                    <a href="{{ route('portfolios', ['filter[category]' => $child->id]) }}"
                                                        class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                                        {{ $child->name }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                    @foreach ($rootCategories as $category)
                                        @foreach ($category->children as $child)
                                            <div data-level="k{{ $child->id }}"
                                                class="list hidden @if ($child->id == request('filter.category')) active @endif [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[153px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65">
                                                @foreach ($child->children as $descandant)
                                                    <a href="{{ request()->fullUrlWithQuery(['filter[category]' => $descandant->id]) }}"
                                                        class="text-tertiary-950 text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                                        {{ $descandant->name }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    @endforeach


                                </div>

                                <div class="address-wrapper mt-6">
                                    <div class="title text-3.5 font-semibold text-tertiary-950 mb-4 px-3 capitalize">
                                        {{ __('general.address') }}</div>
                                    <div class="form-wrapper grid gap-2">
                                        <div class="form-el group/form relative w-full">
                                            <select name="filter[country]"
                                                class="peer w-full h-11 duration-300 rounded-2.5 px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700 invalid:!text-[#6D6D6D]">
                                                <option @selected(true) value="1" selected>Türkiye
                                                </option>
                                            </select>
                                            <div
                                                class="icon icon-chevron-bottom text-2 h-2 block leading-none duration-300 text-[#6D6D6D] pointer-events-none absolute right-5 top-4.5 peer-focus:rotate-180">
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-el group/form relative w-full">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <select
                                                @change="loadTowns(`{{ route('province.towns') }}/`+$event.target.value)"
                                                name="filter[province]"
                                                class="peer w-full h-11 duration-300 rounded-2.5 px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700 invalid:!text-[#6D6D6D]">
                                                <option selected>{{ __('general.province') }}</option>

                                                @foreach ($provinces as $province)
                                                    <option @selected($province->id == request('filter.province')) value="{{ $province->id }}">
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="icon icon-chevron-bottom text-2 h-2 block leading-none duration-300 text-[#6D6D6D] pointer-events-none absolute right-5 top-4.5 peer-focus:rotate-180">
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-el group/form relative w-full">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <select name="filter[town]"
                                                class="peer w-full h-11 duration-300 rounded-2.5 px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700 invalid:!text-[#6D6D6D]">
                                                <option selected>
                                                    {{ __('general.town') }}
                                                </option>
                                                <template x-for="town in towns">
                                                    <option :selected="selectedTown == town.id" x-text="town.name"
                                                        :value="town.id"></option>
                                                </template>
                                            </select>
                                            <div
                                                class="icon icon-chevron-bottom text-2 h-2 block leading-none duration-300 text-[#6D6D6D] pointer-events-none absolute right-5 top-4.5 peer-focus:rotate-180">
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-wrapper mt-6">
                                    <div class="title text-3.5 font-semibold text-tertiary-950 mb-4 px-3 capitalize">
                                        {{ __('general.price') }}
                                    </div>
                                    <div
                                        class="custom-radio-group flex items-center gap-2 mb-2 xs:justify-center border border-solid border-[#8AA5D3]/15 rounded-2">
                                        <div class="custom-radio relative w-full">
                                            <input @checked(request('filter.currency', 'tl') == 'tl') type="radio" name="filter[currency]"
                                                value="tl"
                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                                            <div
                                                class="box text-3.5 md:text-3 font-medium w-full h-9 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                TRY</div>
                                        </div>
                                        <div class="custom-radio relative w-full">
                                            <input @checked(request('filter.currency') == 'eur') type="radio" name="filter[currency]"
                                                value="eur"
                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                                            <div
                                                class="box text-3.5 md:text-3 font-medium w-full h-9 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                EUR</div>
                                        </div>
                                        <div class="custom-radio relative w-full">
                                            <input @checked(request('filter.currency') == 'usd') type="radio" name="filter[currency]"
                                                value="usd"
                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                                            <div
                                                class="box text-3.5 md:text-3 font-medium w-full h-9 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                USD</div>
                                        </div>
                                    </div>
                                    <div class="form-wrapper flex items-center gap-2">
                                        <div class="form-el relative group/form w-full">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <input value="{{ request('filter.min_price') }}" name="filter[min_price]"
                                                placeholder="min"
                                                class="w-full h-11 duration-300 rounded-2.5 px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-el relative group/form w-full">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <input value="{{ request('filter.max_price') }}" name="filter[max_price]"
                                                placeholder="max "
                                                class="w-full h-11 duration-300 rounded-2.5 px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($filters as $filter)
                                    <div
                                        class="checkbox-wrapper border border-solid border-[#8AA5D3]/15 bg-[#F2F8FD] rounded-2.5 mt-6 p-5">
                                        <div class="title text-3.5 font-semibold text-tertiary-950 mb-4 capitalize">
                                            {{ $filter->name }}</div>
                                        <div
                                            class="list-wrapper grid gap-2.5 overflow-x-hidden overflow-y-auto max-h-[135px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65">
                                            @foreach ($filter->options as $value)
                                                <div class="custom-checkbox relative flex items-center gap-2.5">
                                                    <input hidden name="filter[info][{{ $filter->id }}][id]"
                                                        value="{{ $filter->id }}" />
                                                    <input type="checkbox" @checked(in_array($value->id, request('filter.info.' . $filter->id, [])))
                                                        value="{{ $value->id }}"
                                                        name="filter[info][{{ $filter->id }}][]"
                                                        class="peer absolute left-0 top-0 w-full h-full z-2 cursor-pointer opacity-0">
                                                    <div
                                                        class="box relative duration-300 w-4 aspect-square shrink-0 rounded-0.75 bg-white border border-solid border-[#8AA5D3]/50 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                                    </div>
                                                    <div
                                                        class="text leading-tight duration-300 text-3.5 font-medium text-tertiary-950 [-webkit-text-stroke:0.5px_transparent] peer-checked:text-[#2675FA] peer-checked:[-webkit-text-stroke:0.5px_#2675FA]">
                                                        {{ $value->name }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                <div
                                    class="radio-wrapper border border-solid border-[#8AA5D3]/15 bg-[#F2F8FD] rounded-2.5 mt-3 p-5">
                                    <div class="title text-3.5 font-semibold text-tertiary-950 mb-4">Kelime ile filtrele
                                    </div>
                                    <div class="form-el relative group/form w-full mb-2">
                                        <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                        <input value="{{ request('filter.search') }}" type="text"
                                            name="filter[search]" placeholder="kelime"
                                            class="w-full h-11 duration-300 rounded-2.5 px-5 bg-white placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-[#8AA5D3]/15 hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                        <div
                                            class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            Lütfen ilgili alanı doldurunuz.</div>
                                    </div>
                                    <div class="form-el group/form w-full">
                                        <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                        <div class="custom-input relative flex items-center gap-2">
                                            <input type="checkbox" name="include_description" @checked(request('include_description') == 'on')
                                                class="opacity-0 absolute left-0 top-0 w-full h-full peer z-2 cursor-pointer">
                                            <div
                                                class="box relative duration-300 w-4 aspect-square shrink-0 bg-white rounded-0.75 border border-solid border-[#8AA5D3]/30 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                            </div>
                                            <div class="text text-tertiary-950 text-3 leading-tight font-medium">ilan
                                                açıklamalarını dahil et</div>
                                        </div>
                                        <div
                                            class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            Lütfen ilgili alanı doldurunuz.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-el group/form w-full sticky bottom-6 mt-7.5">
                                <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                <button type="submit"
                                    class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none h-16 xl:h-14 md:h-12 w-full px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">
                                    <div
                                        class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                        {{ __('general.search') }}
                                    </div>
                                </button>

                            </div>
                        </form>
                    </div>
                    <div class="content-wrapper">

                        <div
                            class="heading-wrapper flex items-center justify-between sm:flex-col sm:gap-4 gap-7.5 px-2 mb-5">
                            <div class="text font-medium text-tertiary-950 text-3.5 sm:text-center capitalize"><strong>
                                    <span x-text="selectedTownName"></span> {{ $selectedCategory?->name }}
                                    {{ $selectedCategory?->rootAncestor?->name }}
                                </strong> <strong>{{ $portfolios->total() }}</strong> {{ __('general.ad_found') }}</div>


                            <div class="tools-wrapper">
                                <div class="view-wrapper flex items-center gap-3">
                                    <div class="text text-3 font-medium text-[#6D6D6D]">Görünüm</div>
                                    <div class="options flex items-center shrink-0">
                                        <a href="{{ request()->fullUrlWithQuery(['grid_type' => 'list']) }}"
                                            class="item text-[#8AA5D3] h-10 flex items-center justify-center border border-solid border-[#8AA5D3]/30 bg-[#F2F8FD] px-3 rounded-bl-2 rounded-tl-2 hover:border-[#8AA5D3] hover:text-[#2675FA] duration-300 [&.active]:pointer-events-none [&.active]:text-white [&.active]:bg-[#2675FA] [&.active]:border-[#2675FA] @if (request()->query('grid_type') == 'list') active @endif ">
                                            <div
                                                class="icon icon-row text-5 h-5 block leading-none
                                        ">
                                            </div>
                                        </a>
                                        <a href="{{ request()->fullUrlWithQuery(['grid_type' => 'grid']) }}"
                                            class="item text-[#8AA5D3] h-10 flex items-center justify-center border border-solid border-[#8AA5D3]/30 bg-[#F2F8FD] px-3 rounded-br-2 rounded-tr-2 hover:border-[#8AA5D3] hover:text-[#2675FA] duration-300 [&.active]:pointer-events-none [&.active]:text-white [&.active]:bg-[#2675FA] [&.active]:border-[#2675FA]
                                        @if (request()->query('grid_type') == 'grid') active @endif">
                                            <div class="icon icon-grid text-5 h-5 block leading-none"></div>
                                        </a>
                                    </div>
                                    <div class="order-select relative w-[145px] sm:w-[130px]">
                                        <select @change="sortBy($event.target.value)"
                                            class="peer
                                            duration-300 w-full block h-10 bg-white border border-solid border-[#8AA5D3]/15
                                            rounded-2 px-5 text-3.5 font-semibold text-[#6D6D6D] hover:border-[#8AA5D3]/50
                                            focus:border-[#8AA5D3]/50">
                                            <option value="" selected disabled>{{ __('general.sort') }}</option>
                                            <option value="price_in_tl" @selected(request('sort') == 'price_in_tl')>
                                                {{ __('general.low_price_first') }}</option>
                                            <option value="-price_in_tl" @selected(request('sort') == '-price_in_tl')>
                                                {{ __('general.high_price_first') }}</option>
                                            <option value="-created_at" @selected(request('sort') == '-created_at')>
                                                {{ __('general.new_created_at') }}</option>
                                            <option value="created_at" @selected(request('sort') == 'created_at')>
                                                {{ __('general.old_created_at') }}</option>
                                        </select>
                                        <div
                                            class="icon icon-chevron-bottom text-2 h-2 block leading-none duration-300 text-[#6D6D6D] pointer-events-none absolute right-5 top-1/2 -translate-y-1/2 peer-focus:rotate-180">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (request('map') == 1)
                            <div style="margin-bottom: 50px">
                                @include('admin.portfolios.map_cluster', ['locations' => $locations])
                            </div>
                        @endif
                        @if (request()->query('grid_type') == 'list')
                            <div class="list-wrapper grid grid-cols-1 gap-6">
                                @foreach ($portfolios as $portfolio)
                                    <div
                                        class="portfolio group/item grid grid-cols-[minmax(0,300px)_minmax(0,auto)_minmax(0,40px)] gap-9 sm:gap-0 sm:grid-cols-1 items-center p-2.5 sm:p-2.5 pr-11 bg-white rounded-6 md:rounded-3 border border-solid border-transparent hover:border-[#8AA5D3]/35 duration-300">
                                        <div class="carousel-wrapper w-full">
                                            <div
                                                class="portfolio-images-carousel w-full relative swiper !h-auto shadow-s3 rounded-6 md:rounded-3 overflow-hidden isolate">
                                                <div class="swiper-wrapper !h-auto">
                                                    @foreach ($portfolio->media as $image)
                                                        <div class="swiper-slide">
                                                            <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                                                class="image group block aspect-[36/25] overflow-hidden isolate translate-z-0"><img
                                                                    class="full-cover group-hover:scale-105 duration-450 translate-z-0 pointer-events-none"
                                                                    src="{{ $image->original_url }}" alt=""
                                                                    loading="lazy"></a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div
                                                    class="portfolio-images-next flex items-center justify-center cursor-pointer z-5 absolute right-5.5 top-1/2 -translate-y-1/2 w-7 aspect-square rounded-full bg-white text-tertiary-950 [&:not(.swiper-button-disabled):hover]:bg-main-700 [&:not(.swiper-button-disabled):hover]:text-white duration-300 [&.swiper-button-disabled]:cursor-default min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                                    <div class="icon icon-chevron-right text-2 h-2 block leading-none">
                                                    </div>
                                                </div>
                                                <div
                                                    class="portfolio-images-prev flex items-center justify-center cursor-pointer z-5 absolute left-5.5 top-1/2 -translate-y-1/2 w-7 aspect-square rounded-full bg-white text-tertiary-950 [&:not(.swiper-button-disabled):hover]:bg-main-700 [&:not(.swiper-button-disabled):hover]:text-white duration-300 [&.swiper-button-disabled]:cursor-default min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                                    <div class="icon icon-chevron-left text-2 h-2 block leading-none">
                                                    </div>
                                                </div>
                                                <div
                                                    class="portfolio-images-pagination duration-300 !flex items-center justify-center gap-3 absolute !left-1/2 -translate-x-1/2 !bottom-5.5 z-5 !w-fit !right-auto !top-auto [&_span]:w-2 [&_span]:h-2 [&_span]:!m-0 [&_span]:!p-0 [&_span]:opacity-100 [&_span]:bg-white/40 [&_span:hover]:bg-white [&_span]:duration-300 [&_span.swiper-pagination-bullet-active]:pointer-events-none [&_span.swiper-pagination-bullet-active]:bg-white min-lg:opacity-0 min-lg:pointer-events-none min-lg:group-hover/item:opacity-100 min-lg:group-hover/item:pointer-events-auto">
                                                </div>
                                                <div
                                                    class="tag absolute left-4 top-4 bg-tertiary-950/50 rounded-2 px-2 py-1.5 text-white text-3 font-medium leading-none z-5 capitalize">
                                                    {{ $portfolio->main_category }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-wrapper sm:p-4 sm:mt-2.5">
                                            <div class="item flex items-center gap-2 mb-2">
                                                <div
                                                    class="icon icon-location-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                </div>
                                                <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                    {{ $portfolio->district->county->province->name }}/{{ $portfolio->district->county->name }}
                                                    ,<span class="capitalize">
                                                        {{ $portfolio->district->name }}
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                                class="title text-4.5 leading-tight text-tertiary-950 hover:text-main-700 duration-300 font-semibold mb-4 xl:mb-5 md:mb-4 block capitalize">

                                                {{ $portfolio->title }}
                                            </a>
                                            <div class="price text-[#2675FA] font-semibold text-5 lg:text-4.5 md:text-4">
                                                {{ $portfolio->price_in_try }} ₺

                                            </div>
                                            <div class="info flex items-center justify-between gap-7.5 mt-5 md:mt-4">
                                                <div
                                                    class="tags flex flex-wrap items-center gap-8 2xl:gap-7 xl:gap-6 lg:gap-5 md:gap-4 sm:gap-3">
                                                    @if ($portfolio->rooms_count)
                                                        <div class="item flex items-center gap-2">
                                                            <div
                                                                class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                                <div
                                                                    class="icon icon-bedroom text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                                </div>
                                                            </div>
                                                            <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                                {{ $portfolio->rooms_count }}</div>
                                                    @endif
                                                </div>
                                                <div class="item flex items-center gap-2">
                                                    <div
                                                        class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                        <div
                                                            class="icon icon-square-meter-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                        </div>
                                                    </div>
                                                    <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                        {{ $portfolio->net_area }} m²</div>
                                                </div>
                                            </div>
                                            <button
                                                class="button shrink-0 add-favorite group/button relative duration-300 bg-[#EFF5FF] hidden sm:flex items-center justify-center h-10 aspect-square rounded-full hover:border-tertiary-950/30">
                                                <div
                                                    class="icon icon-like text-4 h-4 block leading-none duration-300 text-[#DC1C2E]">
                                                </div>
                                                <div
                                                    class="icon icon-liked text-4 h-4 block leading-none duration-300 text-[#DC1C2E] absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover/button:opacity-100 group-[&.favorited]/button:opacity-100">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <button
                                        class="button shrink-0 add-favorite group/button relative duration-300 bg-[#EFF5FF] flex items-center justify-center h-10 aspect-square rounded-full hover:border-tertiary-950/30 sm:hidden">
                                        <div
                                            class="icon icon-like text-4 h-4 block leading-none duration-300 text-[#DC1C2E]">
                                        </div>
                                        <div
                                            class="icon icon-liked text-4 h-4 block leading-none duration-300 text-[#DC1C2E] absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover/button:opacity-100 group-[&.favorited]/button:opacity-100">
                                        </div>
                                    </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="list-wrapper grid grid-cols-3 lg:grid-cols-2 sm:grid-cols-1 gap-x-9 xl:gap-x-8 lg:gap-x-7 gap-y-6">
                        @foreach ($portfolios as $portfolio)
                            <div
                                class="portfolio group/item p-2.5 bg-white rounded-6 md:rounded-3 border border-solid border-transparent hover:border-[#8AA5D3]/35 duration-300">
                                <div class="carousel-wrapper w-full">
                                    <div
                                        class="portfolio-images-carousel w-full relative swiper !h-auto shadow-s3 rounded-6 md:rounded-3 overflow-hidden isolate">
                                        <div class="swiper-wrapper !h-auto">

                                            @foreach ($portfolio->media as $image)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                                        class="image group block aspect-[36/25] overflow-hidden isolate translate-z-0"><img
                                                            class="full-cover group-hover:scale-105 duration-450 translate-z-0 pointer-events-none"
                                                            src="{{ $image->original_url }}" alt=""
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
                                            {{ $portfolio->main_category }}
                                        </div>
                                    </div>
                                </div>
                                <div class="content-wrapper p-5 lg:p-4 mt-2.5">
                                    <div class="item flex items-center gap-2 mb-2">
                                        <div
                                            class="icon icon-location-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                        </div>
                                        <div class=" text-3.5 font-medium text-tertiary-950/40 capitalize">
                                            {{ $portfolio->district->county->province->name }}/{{ $portfolio->district->county->name }}
                                            ,
                                            {{ $portfolio->district->name }}
                                        </div>
                                    </div>
                                    <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                        class="title text-4.5 leading-tight text-tertiary-950 hover:text-main-700 duration-300 font-semibold mb-4 xl:mb-5 md:mb-4 block capitalize">{{ $portfolio->title }}</a>
                                    <div div class="price text-[#2675FA] font-semibold text-5 lg:text-4.5 md:text-4">
                                        {{ $portfolio->price_in_try }} ₺
                                    </div>
                                    <div class="info flex items-center justify-between gap-7.5 mt-5 md:mt-4">
                                        <div
                                            class="tags flex flex-wrap items-center gap-8 2xl:gap-7 xl:gap-6 lg:gap-5 md:gap-4 sm:gap-3">
                                            @if ($portfolio->rooms_count)
                                                <div class="item flex items-center gap-2">
                                                    <div
                                                        class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                        <div
                                                            class="icon icon-bedroom text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                        </div>
                                                    </div>
                                                    <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                        {{ $portfolio->rooms_count }}</div>
                                                </div>
                                            @endif
                                            <div class="item flex items-center gap-2">
                                                <div
                                                    class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                    <div
                                                        class="icon icon-square-meter-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                    </div>
                                                </div>
                                                <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                    {{ $portfolio->net_area }} m²</div>
                                            </div>
                                        </div>
                                        <button @click="addToFavorites(`{{ $portfolio->id }}`)"
                                            class="button shrink-0 add-favorite group/button relative duration-300 bg-[#EFF5FF] flex items-center justify-center h-10 aspect-square rounded-full hover:border-tertiary-950/30"
                                            :class="localStorage.getItem(`portfolio_{{ $portfolio->id }}`) && 'favorited'">
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
                    @endif
                    {{ $portfolios->links('vendor.pagination.loca') }}

                </div>
                </div>
            </section>

        </main>


    </soho-technologies>
@endsection
