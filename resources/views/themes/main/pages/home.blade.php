@extends('layouts.frontend')

@section('title', 'RE/MAX LOCA')

@section('content')

    <section class="hero-field relative mb-20 2xl:mb-16 xl:mb-12 lg:mb-8 overflow-hidden isolate bg-tertiary-950"
        x-data="{
            towns: [],
            category: 1,
            map: 0,
            minFormattedNumber: null,
            maxFormattedNumber: null,
            formatMinNumber(event) {
                let input = event.target;
                let number = parseInt(input.value.replace(/\D/g, ''));
                if (!isNaN(number)) {
                    let formatted = number.toLocaleString('tr-TR');
                    input.value = formatted;
                }
            },
            formatMaxNumber(event) {
                let input = event.target;
                let number = parseInt(input.value.replace(/\D/g, ''));
                if (!isNaN(number)) {
                    let formatted = number.toLocaleString('tr-TR');
                    input.value = formatted;
                }
            },
            loadTowns(id) {
                // TODO
                {{-- const url = `{{ route('province.county') }}/` + id --}}
                const url = '';
                const self = this
                axios.get(url).then((res) => {
                    console.log(res.data.towns)
                    self.towns = res.data.towns
        
                }).catch((err) => {
                    console.log(err)
                })
            },
        }">
        <div class="hero-bg-carousel swiper !h-full !absolute left-0 top-0 !w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide w-full h-full relative overflow-hidden isolate">
                        <div class="background absolute left-0 top-0 w-full h-full bg-tertiary-950"><img
                                data-swiper-parallax-x="50%" data-swiper-parallax-scale="1.25" class="full-cover opacity-20"
                                src="{{ asset('image/photo/8.webp') }}" alt="" loading="lazy"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide w-full h-full relative overflow-hidden isolate">
                        <div class="background absolute left-0 top-0 w-full h-full bg-tertiary-950"><img
                                data-swiper-parallax-x="50%" data-swiper-parallax-scale="1.25" class="full-cover opacity-20"
                                src="{{ asset('image/photo/8.webp') }}" alt="" loading="lazy"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide w-full h-full relative overflow-hidden isolate">
                        <div class="background absolute left-0 top-0 w-full h-full bg-tertiary-950"><img
                                data-swiper-parallax-x="50%" data-swiper-parallax-scale="1.25" class="full-cover opacity-20"
                                src="{{ asset('image/photo/8.webp') }}" alt="" loading="lazy"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-content-wrapper h-full pt-[134px] sm:pt-[124px] relative z-5">
            <div
                class="wrapper max-w-1440 mx-auto w-full px-7.5 pt-32 2xl:pt-24 xl:pt-16 lg:pt-10 md:pt-8 sm:pt-6 pb-10 md:pb-8 sm:pb-6">
                <div class="hero-text-carousel swiper !h-auto">
                    <div class="swiper-wrapper !h-auto">
                        <div class="swiper-slide">
                            <div class="inner max-w-[575px] md:max-w-none">
                                <div
                                    class="title leading-none text-14 2xl:text-12 xl:text-10 lg:text-8 font-semibold text-white md:text-center ">
                                    {{ __('general.find_land') }}</div>
                                <div
                                    class="tags flex items-center md:justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 sm:gap-x-2 gap-y-2 md:gap-y-1.5 sm:gap-y-0.5 mt-7.5 2xl:mt-6 xl:mt-5 lg:mt-4 md:mt-3">
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LOCAdaYeriniAL</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LocaFarkYaratır</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #EskiUsulEmlakçılığaSon</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #SizinİçinEnİyisiLOCA</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner max-w-[575px] md:max-w-none">
                                <div
                                    class="title leading-none text-14 2xl:text-12 xl:text-10 lg:text-8 font-semibold text-white md:text-center ">
                                    {{ __('general.find_land') }}</div>
                                <div
                                    class="tags flex items-center md:justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 sm:gap-x-2 gap-y-2 md:gap-y-1.5 sm:gap-y-0.5 mt-7.5 2xl:mt-6 xl:mt-5 lg:mt-4 md:mt-3">
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LOCAdaYeriniAL</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LocaFarkYaratır</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #EskiUsulEmlakçılığaSon</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #SizinİçinEnİyisiLOCA</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner max-w-[575px] md:max-w-none">
                                <div
                                    class="title leading-none text-14 2xl:text-12 xl:text-10 lg:text-8 font-semibold text-white md:text-center ">
                                    {{ __('general.find_land') }}</div>
                                <div
                                    class="tags flex items-center md:justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 sm:gap-x-2 gap-y-2 md:gap-y-1.5 sm:gap-y-0.5 mt-7.5 2xl:mt-6 xl:mt-5 lg:mt-4 md:mt-3">
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LOCAdaYeriniAL</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #LocaFarkYaratır</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #EskiUsulEmlakçılığaSon</div>
                                    <div
                                        class="block w-fit text-4.5 xl:text-4 lg:text-3.5 md:text-3 font-medium duration-300 text-[#B0B0B0]">
                                        #SizinİçinEnİyisiLOCA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="filter-outer-wrapper grid grid-cols-3/9 xl:grid-cols-2/10 md:grid-cols-1 gap-7.5 mt-20 2xl:mt-16 xl:mt-12 lg:mt-8">
                    <div class="category-wrapper flex md:order-2">
                        <div
                            class="inner bg-white self-stretch overflow-hidden isolate w-full rounded-6 md:rounded-3 py-7.5 lg:p-6 px-10 relative after:absolute after:left-0 after:top-0 after:w-full after:h-full after:bg-gradient-to-t after:from-white grayscale duration-300 after:duration-300 hover:after:opacity-0 hover:grayscale-0 after:pointer-events-none">
                            <div class="heading-wrapper">
                                <div class="title text-4 text-[#2675FA] duration-300 font-semibold mb-2">
                                    {{ __('general.categories') }}</div>
                                <div class="location-wrapper hidden [&.active]:block">
                                    <div class="location-list flex items-center gap-2 flex-wrap"></div>
                                    <div class="split w-full h-px bg-[#E8F0FD] mb-5 mt-5"></div>
                                </div>
                            </div>
                            <div data-level="y0"
                                class="list hidden [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[196px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65 active">

                                @foreach ($rootCategories as $category)
                                    @if ($category->children->isEmpty())
                                        <a href="{{ route('portfolios', ['filter[category]' => $category->id]) }}"
                                            class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                            {{ $category->name }}
                                        </a>
                                    @else
                                        <button data-destination-level="s{{ $category->id }}"
                                            class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                            {{ $category->name }}
                                        </button>
                                    @endif
                                @endforeach

                            </div>
                            @foreach ($rootCategories as $category)
                                <div data-level="s{{ $category->id }}"
                                    class="list hidden capitalize [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[153px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65">
                                    @foreach ($category->children as $child)
                                        @if ($child->children->isEmpty())
                                            <a href="{{ route('portfolios', ['filter[category]' => $child->id]) }}"
                                                data-destination-level="k{{ $child->id }}"
                                                class="text-tertiary-950 text-3.5 w-fit capitalize font-medium draw-underline [--line-color:#0D1523] block">
                                                {{ $child->name }}
                                            </a>
                                        @else
                                            <button data-destination-level="p{{ $child->id }}"
                                                class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                                {{ $child->name }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach



                            @foreach ($rootCategories as $category)
                                @foreach ($category->children as $child)
                                    <div data-level="p{{ $child->id }}"
                                        class="list hidden [&.active]:grid gap-1 overflow-y-auto overflow-x-hidden max-h-[153px] scrollbar scrollbar-w-1 scrollbar-track-rounded-full scrollbar-thumb-rounded-full scrollbar-track-[#8AA5D3]/24 scrollbar-thumb-[#8AA5D3]/65">
                                        @foreach ($child->children as $descandant)
                                            @if ($descandant->children->isEmpty())
                                                <a href="{{ route('portfolios', ['filter[category]' => $descandant->id]) }}"
                                                    data-destination-level="p{{ $child->id }}"
                                                    class="text-tertiary-950 text-3.5 w-fit capitalize font-medium draw-underline [--line-color:#0D1523] block">
                                                    {{ $descandant->name }}
                                                </a>
                                            @else
                                                <button data-destination-level="p{{ $descandant->id }}"
                                                    class="text-tertiary-950 capitalize text-3.5 w-fit font-medium draw-underline [--line-color:#0D1523] block">
                                                    {{ $descandant->name }}
                                                </button>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                    <div class="self-filter-wrapper md:order-1">
                        <div
                            class="category-select flex items-center gap-7.5 xl:gap-6 md:gap-5 bg-white rounded-6 md:rounded-3 !rounded-bl-0 !rounded-br-0 px-10 xl:px-9 lg:px-8 md:px-7 py-6 lg:py-5 md:py-4 w-fit mx-auto sm:hidden">
                            @foreach ($searchableCategories as $searchableCategory)
                                <div class="custom-radio relative flex items-center gap-2 cursor-pointer">
                                    <input @checked($loop->first) type="radio"
                                        @click="category=`{{ $searchableCategory->id }}`"
                                        class="peer absolute left-0 top-0 w-full h-full z-3 cursor-pointer opacity-0"
                                        name="s5">
                                    <div
                                        class="icon @if ($loop->first) icon-house @else icon-{{ $searchableCategory->getTranslation('name', 'en') }} @endif text-6 h-6 xl:text-5 xl:h-5 md:text-4.5 md:h-4.5 block leading-none duration-300 text-black/30 peer-hover:text-secondary-700 peer-checked:text-secondary-700">
                                    </div>
                                    <div
                                        class="text text-4.5 xl:text-4 md:text-3.5 font-semibold text-black/47 duration-300 peer-hover:text-secondary-700 peer-checked:text-secondary-700 capitalize">
                                        {{ $searchableCategory->name }}
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!-- Bu yukarıdaki radionun mobil için olan versiyonu -->
                        <div
                            class="custom-select bg-white p-3 rounded-3 !rounded-bl-0 !rounded-br-0 hidden sm:block max-w-[90%] w-full mx-auto">
                            <div class="form-el group/form relative w-full">
                                <select name="filter[category]"
                                    class="peer w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700 invalid:!text-[#6D6D6D]"
                                    @change="category=($event.target.value)" required>
                                    <option disabled selected>Gayrimenkul Tipi Seçin</option>
                                    @foreach ($rootCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div
                                    class="icon icon-chevron-bottom text-2.5 h-2.5 md:text-2 md:h-2 block leading-none duration-300 text-[#6D6D6D] pointer-events-none absolute right-7 md:right-5 top-[23px] md:top-5 peer-focus:rotate-180">
                                </div>
                                <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                    Lütfen ilgili alanı doldurunuz.</div>
                            </div>
                        </div>
                        <div
                            class="filter-wrapper bg-[#E3EDF5]/85 backdrop-blur-lg p-5 rounded-7.5 xl:rounded-5 md:rounded-3">
                            <form action="{{ route('portfolios') }}" class="w-full">
                                <input type="hidden" name="filter[category]" :value="category">
                                <div class="form-wrapper grid grid-cols-10/2 md:grid-cols-1 gap-3">
                                    <div class="input-wrapper grid grid-cols-7/5 md:grid-cols-2 sm:grid-cols-1 gap-3">
                                        <div class="form-el group/form w-full sm:order-1">
                                            <div
                                                class="custom-input h-22 bg-white rounded-6 md:rounded-3 px-10 2xl:px-9 xl:px-8 lg:px-7 md:px-6 flex flex-col justify-center border border-solid border-transparent duration-300 group-[&.error]/form:border-secondary-700">
                                                <label for="q1"
                                                    class="block text-3.5 font-semibold text-tertiary-950 mb-1">
                                                    {{ __('general.search') }}
                                                </label>
                                                <input name="filter[search]" id="q1" type="text"
                                                    placeholder="Örn: 3+1 Satılık veya İlan No"
                                                    class="text-4 placeholder:text-[#B0B0B0] font-medium text-tertiary-950 w-full">
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-el group/form w-full sm:order-3">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <div
                                                class="custom-select relative h-22 sm:h-16 bg-white rounded-6 md:rounded-3 px-10 2xl:px-9 xl:px-8 lg:px-7 md:px-6 flex flex-col justify-center border border-solid border-transparent duration-300 group-[&.error]/form:border-secondary-700">
                                                <select
                                                    class="peer w-full h-full text-4 sm:text-3.5 font-semibold text-tertiary-950">
                                                    <option value="" selected disabled>Türkiye</option>
                                                </select>
                                                <div
                                                    class="icon icon-chevron-bottom text-3 h-3 lg:text-2.5 lg:h-2.5 block leading-none duration-300 absolute right-10 2xl:right-9 xl:right-8 lg:right-7 md:right-6 top-50/100 -translate-y-1/2 pointer-events-none peer-focus:rotate-180 text-tertiary-950">
                                                </div>
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-el group/form w-full sm:order-2">
                                            <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                            <div
                                                class="custom-input h-22 xs:h-auto xs:py-5 bg-white rounded-6 md:rounded-3 px-10 2xl:px-9 xl:px-8 lg:px-7 md:px-6 flex items-center justify-between gap-2 border border-solid border-transparent duration-300 group-[&.error]/form:border-secondary-700 xs:grid xs:grid-cols-2">
                                                <div class="inner-group flex flex-col w-fit xs:w-full">
                                                    <label for="q2"
                                                        class="block text-3.5 font-semibold text-tertiary-950 mb-1 xs:text-center">{{ __('general.price') }}</label>
                                                    <input x-model="minFormattedNumber" @input="formatMinNumber"
                                                        :value="minFormattedNumber" name="filter[min_price]"
                                                        id="q2" type="text" placeholder="Min"
                                                        class="text-4 placeholder:text-[#B0B0B0] font-medium text-tertiary-950 w-10 xs:w-full xs:text-center">
                                                </div>
                                                <div class="split h-11 w-px bg-[#D1D1D1]/50 shrink-0 xs:hidden">
                                                </div>
                                                <div class="inner-group flex flex-col w-fit xs:w-full">
                                                    <label for="q3"
                                                        class="block text-3.5 font-semibold text-tertiary-950 mb-1 xs:text-center">{{ __('general.price') }}</label>
                                                    <input x-model="maxFormattedNumber" @input="formatMaxNumber"
                                                        :value="maxFormattedNumber" name="filter[max_price]"
                                                        id="q3" type="text" placeholder="Max"
                                                        class="text-4 placeholder:text-[#B0B0B0] font-medium text-tertiary-950 w-10 xs:w-full xs:text-center">
                                                </div>
                                                <div
                                                    class="split hidden xs:block w-full h-px col-span-2 bg-[#D1D1D1]/50 my-2.5">
                                                </div>
                                                <div class="inner-group xs:col-span-2">
                                                    <div
                                                        class="custom-radio-group flex items-center gap-3 xl:gap-2 xs:justify-center">
                                                        <div class="custom-radio relative">
                                                            <input name="filte[currency]" value="tl" type="radio"
                                                                name="r1"
                                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer"
                                                                checked>
                                                            <div
                                                                class="box text-3.5 md:text-3 font-medium w-16 xl:w-14 md:w-12 h-12 xl:h-10 md:h-8 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                                TRY</div>
                                                        </div>
                                                        <div class="custom-radio relative">
                                                            <input name="filte[currency]" value="eur" type="radio"
                                                                name="r1"
                                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                                                            <div
                                                                class="box text-3.5 md:text-3 font-medium w-16 xl:w-14 md:w-12 h-12 xl:h-10 md:h-8 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                                EUR</div>
                                                        </div>
                                                        <div class="custom-radio relative">
                                                            <input name="filte[currency]" value="usd" type="radio"
                                                                name="r1"
                                                                class="peer absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer">
                                                            <div
                                                                class="box text-3.5 md:text-3 font-medium w-16 xl:w-14 md:w-12 h-12 xl:h-10 md:h-8 rounded-2 flex items-center justify-center text-[#888888] peer-hover:text-tertiary-950 duration-300 border border-solid border-transparent [-webkit-text-stroke:0.5px_transparent] peer-checked:pointer-events-none peer-checked:border-[#144495] peer-checked:bg-[#144495]/5 peer-checked:text-[#144495] peer-checked:[-webkit-text-stroke:0.5px_#144495]">
                                                                USD</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                Lütfen ilgili alanı doldurunuz.</div>
                                        </div>
                                        <div class="form-group grid grid-cols-2 xs:grid-cols-1 gap-2 xs:gap-3 sm:order-4">
                                            <div class="form-el group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <div
                                                    class="custom-select relative h-22 sm:h-16 bg-white rounded-6 md:rounded-3 px-10 2xl:px-9 xl:px-8 lg:px-7 md:px-6 flex flex-col justify-center border border-solid border-transparent duration-300 group-[&.error]/form:border-secondary-700">
                                                    <select name="filter[province]"
                                                        @change="loadTowns($event.target.value)"
                                                        class="peer
                                                        w-full h-full text-4 sm:text-3.5 font-semibold text-tertiary-950">
                                                        <option value="" selected disabled>
                                                            {{ __('general.province') }}</option>
                                                        @foreach ($provinces as $province)
                                                            <option @selected($province->id == request('filter.province'))
                                                                value="{{ $province->id }}">{{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div
                                                        class="icon icon-chevron-bottom text-3 h-3 lg:text-2.5 lg:h-2.5 block leading-none duration-300 absolute right-10 2xl:right-9 xl:right-8 lg:right-7 md:right-6 top-50/100 -translate-y-1/2 pointer-events-none peer-focus:rotate-180 text-tertiary-950">
                                                    </div>
                                                </div>
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <div
                                                    class="custom-select relative h-22 sm:h-16 bg-white rounded-6 md:rounded-3 px-10 2xl:px-9 xl:px-8 lg:px-7 md:px-6 flex flex-col justify-center border border-solid border-transparent duration-300 group-[&.error]/form:border-secondary-700">
                                                    <select name="filter[town]"
                                                        class="peer w-full h-full text-4 sm:text-3.5 font-semibold text-tertiary-950">
                                                        <option selected>{{ __('general.town') }}</option>
                                                        <template x-for="town in towns">
                                                            <option :selected="selectedTown == town.id" x-text="town.name"
                                                                :value="town.id"></option>
                                                        </template>
                                                    </select>
                                                    <div
                                                        class="icon icon-chevron-bottom text-3 h-3 lg:text-2.5 lg:h-2.5 block leading-none duration-300 absolute right-10 2xl:right-9 xl:right-8 lg:right-7 md:right-6 top-50/100 -translate-y-1/2 pointer-events-none peer-focus:rotate-180 text-tertiary-950">
                                                    </div>
                                                </div>
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen ilgili alanı doldurunuz.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-wrapper grid gap-3">
                                        <div class="form-el group/form">
                                            <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                            <button
                                                class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none bg-[#144495] hover:bg-main-700 h-22 md:h-16 w-full text-white font-semibold text-4">
                                                <div
                                                    class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                                    {{ __('general.search') }}</div>
                                            </button>
                                        </div>
                                        <input type="hidden" name="map" :value="map" />
                                        <div class="form-el group/form">
                                            <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                            <button type="submit" @click="map=1"
                                                class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none bg-secondary-700 hover:bg-secondary-600 h-22 md:h-16 w-full text-white font-semibold text-4">
                                                <div
                                                    class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                                    {{ __('general.show_map') }}</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="https://www.youtube.com/watch?v=3CA0gZatTMI"
                    class="hero-trailer block w-fit mx-auto mt-12 2xl:mt-10 xl:mt-8 draw-child-underline [--line-color:#FFFFFF]"
                    data-fancybox>
                    <div
                        class="icon icon-mouse text-7.5 h-7.5 xl:text-6 xl:h-6 md:text-5 md:h-5 block leading-none duration-300 mx-auto text-white w-fit">
                    </div>
                    <div
                        class="text text-white text-4 xl:text-3.5 md:text-3 font-medium text-center tracking-widest mt-5 2xl:mt-4 xl:mt-3 draw-el">
                        TANITIM VİDEOMUZ</div>
                </a>
            </div>
        </div>
        <div class="navigation-wrapper pointer-events-none z-6 absolute left-0 top-0 w-full h-full 2xl:!hidden">
            <div class="wrapper max-w-1680 mx-auto w-full px-7.5 h-full flex items-center justify-between">
                <div
                    class="hero-prev cursor-pointer shadow-s2 bg-white w-17 2xl:w-15 xl:w-13 lg:w-11 md:w-9 aspect-square rounded-full flex items-center justify-center text-tertiary-950 hover:bg-[#144495] hover:text-white pointer-events-auto duration-300">
                    <div
                        class="icon icon-chevron-left text-4 h-4 xl:text-3.5 xl:h-3.5 lg:text-3 lg:h-3 md:text-2.5 md:h-2.5 block leading-none">
                    </div>
                </div>
                <div
                    class="hero-next cursor-pointer shadow-s2 bg-white w-17 2xl:w-15 xl:w-13 lg:w-11 md:w-9 aspect-square rounded-full flex items-center justify-center text-tertiary-950 hover:bg-[#144495] hover:text-white pointer-events-auto duration-300">
                    <div
                        class="icon icon-chevron-right text-4 h-4 xl:text-3.5 xl:h-3.5 lg:text-3 lg:h-3 md:text-2.5 md:h-2.5 block leading-none">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-field py-20 2xl:py-16 xl:py-12 lg:py-8 overflow-hidden isolate">
        <div class="wrapper max-w-1280 mx-auto w-full px-7.5 grid grid-cols-2 sm:grid-cols-1 items-center gap-7.5">
            <div class="text-wrapper relative z-7">
                <div class="text-editor text-editor-main max-w-[565px] sm:max-w-none">
                    <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                    <h3><strong>{{ __('general.portfolio_categories1') }}
                            <br>{{ __('general.portfolio_categories2') }}</strong></h3>
                    <h6 style="color:#6D6D6D">{{ __('general.classified_category_1') }}
                        <br> {{ __('general.classified_category_2') }}
                    </h6>

                    <h6 style="color:#6D6D6D">
                        {{ __('general.classified_category_3') }}
                    </h6>
                </div>
                <a href="{{ route('portfolios') }}"
                    class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-16 xl:h-14 md:h-12 w-fit px-8 sm:px-6 bg-main-900 hover:bg-main-950 mt-7.5 text-white">

                    <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">{{ __('general.portfolios_link') }}
                    </div>
                    <div class="icon icon-chevron-right text-2.5 h-2.5 block leading-none"></div>
                </a>
            </div>
            <div class="carousel-wrapper">
                <div
                    class="portfolio-type-carousel swiper !h-auto max-w-[365px] sm:max-w-none !mr-0 !ml-auto !overflow-visible">
                    <div class="swiper-wrapper !h-auto">
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/is_yeri_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        İş Yeri</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">

                                        {{ __('general.we_categorize_workplace') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/konut_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        Konut</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">
                                        {{ __('general.we_categorize_residentialproperty') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/turistik_tesis_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        Turistik Tesis</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">
                                        {{ __('general.we_categorize_touristicfacility') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/devre_mulk_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        Devre Mülk</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">
                                        {{ __('general.we_categorize_timeshare') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/bina_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        Bina</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">
                                        {{ __('general.we_categorize_building') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide group/slide min-md:!opacity-100">
                            <a href="javascript:void(0)"
                                class="card block group p-1.5 bg-white rounded-8 xl:rounded-6 md:rounded-3 shadow-s2 min-md:opacity-0 duration-450 min-md:group-[&.swiper-slide-active]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:opacity-100 min-md:group-[&.swiper-slide-prev]/slide:scale-90 min-md:group-[&.swiper-slide-prev]/slide:-translate-x-25/100 min-md:group-[&.swiper-slide-next]/slide:translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:opacity-100 min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:scale-[0.8] min-md:group-[&.swiper-slide:has(+.swiper-slide-prev)]/slide:-translate-x-50/100 min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:-translate-x-full min-md:group-[&.swiper-slide:has(+.swiper-slide+.swiper-slide-prev)]/slide:scale-[0.8]">
                                <div
                                    class="image aspect-[71/55] overflow-hidden isolate !rounded-bl-0 !rounded-br-0 rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover translate-z-0 duration-450 group-hover:scale-105"
                                        src="{{ asset('image/photo/arsa_kategori.webp') }}" alt="RE/MAX Loca"
                                        loading="lazy">
                                </div>
                                <div class="content p-6">
                                    <div
                                        class="title text-tertiary-950 text-5.5 2xl:text-5 xl:text-4.5 lg:text-4 font-semibold duration-300 group-hover:text-main-700 mb-2">
                                        Arsa</div>
                                    <p class="expo text-4 xl:text-3.5 font-medium text-[#6D6D6D]">
                                        {{ __('general.we_categorize_land') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="portfolio-type-pagination !hidden md:!flex items-center justify-center gap-3 !m-0 !mt-12 2xl:!mt-10 xl:!mt-8 lg:!mt-6 !p-0 [&_span]:!m-0 [&_span]:!p-0 [&_span]: [&_span]:w-3 [&_span]:h-3 [&_span]:shrink-0 [&_span]:block [&_span]:rounded-full [&_span]:opacity-100 [&_span]:border [&_span]:border-solid [&_span]:border-main-700 [&_span]:bg-transparent [&_span]:duration-300 [&_span:hover]:bg-main-600 [&_span.swiper-pagination-bullet-active]:bg-main-700 [&_span.swiper-pagination-bullet-active]:pointer-events-none">
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-field py-20 2xl:py-16 xl:py-12 lg:py-8">
        <div class="wrapper max-w-1440 mx-auto w-full px-7.5">
            <div class="text-editor text-editor-main">
                <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                <h3 style="text-align:center;"><strong>{{ __('general.newest_portfolios') }}</strong></h3>
                <p style="text-align:center;">{{ __('general.newset_1') }}
                    <br>{{ __('general.newset_2') }}
                </p>
            </div>
            <div
                class="list my-18 2x:my-15 xl:my-12 lg:my-9 md:my-7.5 grid grid-cols-3 lg:grid-cols-2 sm:grid-cols-1 gap-x-9 xl:gap-x-8 lg:gap-x-7 gap-y-6">


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
                                                    src="{{ $image->original_url }}" alt="" loading="lazy"></a>
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
                                    {{ $portfolio->district->county->province->name }}/{{ $portfolio->district->county->name }},
                                    {{ $portfolio->district->name }}
                                </div>
                            </div>
                            <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                class="title text-4.5 leading-tight text-tertiary-950 hover:text-main-700 duration-300 font-semibold mb-4 xl:mb-5 md:mb-4 block capitalize">{{ $portfolio->title }}</a>
                            <div class="price text-[#2675FA] font-semibold text-5 lg:text-4.5 md:text-4">
                                {{ $portfolio->price }}
                            </div>
                            <div class="info flex items-center justify-between gap-7.5 mt-5 md:mt-4">

                                <div
                                    class="tags flex flex-wrap items-center gap-8 2xl:gap-7 xl:gap-6 lg:gap-5 md:gap-4 sm:gap-3">
                                    @if (false)
                                        <div class="item flex items-center gap-2">
                                            <div
                                                class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                <div
                                                    class="icon icon-bedroom text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                </div>
                                            </div>
                                            <div class="text text-3.5 font-medium text-tertiary-950/40">3+1</div>
                                        </div>
                                        <div class="item flex items-center gap-2">
                                            <div
                                                class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                <div
                                                    class="icon icon-square-meter-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                </div>
                                            </div>
                                            <div class="text text-3.5 font-medium text-tertiary-950/40">352 m²</div>
                                        </div>
                                    @endif
                                </div>

                                <button
                                    class="button shrink-0 add-favorite group/button relative duration-300 bg-[#EFF5FF] flex items-center justify-center h-10 aspect-square rounded-full hover:border-tertiary-950/30">
                                    <div class="icon icon-like text-4 h-4 block leading-none duration-300 text-[#DC1C2E]">
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

    <section class="info-field py-20 2xl:py-16 xl:py-12 lg:py-8">
        <div
            class="wrapper max-w-1440 mx-auto w-full px-7.5 grid grid-cols-2 sm:grid-cols-1 gap-18 2xl:gap-14 xl:gap-10 lg:gap-7.5">
            <div class="image-wrapper">
                <div class="image overflow-hidden isolate rounded-5 md:rounded-3 aspect-[3/2] xs:aspect-[5/4]">
                    <img class="full-cover" src="{{ asset('image/photo/8.webp') }}" alt="" loading="lazy">
                </div>
                <div
                    class="info-box bg-white shadow-s2 rounded-8 xl:rounded-6 md:rounded-3 p-8 md:p-6 w-max mr-8 md:mr-6 sm:mr-4 ml-auto -mt-30 md:-mt-16 sm:-mt-30 relative z-2">
                    <div
                        class="icon icon-headset-3 text-12 h-12 xl:text-10 xl:h-10 lg:text-8 lg:h-8 md:text-6 md:h-6 block leading-none duration-300 text-[#2675FA] mb-5 xl:mb-4 md:mb-3">
                    </div>
                    <div class="title text-4 xl:text-3.5 font-medium text-[#6D6D6D]">{{ __('general.customer_services') }}
                    </div>
                    <a href="javascript:void(0)"
                        class="font-semibold text-[#144495] text-6.5 2xl:text-6 xl:text-5 md:text-4.5 draw-underline [--line-color:#144495]">+90
                        532 427 59 36</a>
                </div>
            </div>
            <div class="text-wrapper">
                <div class="text-editor text-editor-main">
                    <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                    <h3> <strong>{{ __('general.by_number') }}</strong></h3>
                    <p>
                        {{ __('general.by_number_details') }}
                    </p>
                </div>
                <div class="split w-full h-px bg-black/7 my-14 2xl:my-12 xl:my-10 lg:my-8 md:my-6"></div>
                <div
                    class="list grid grid-cols-3 sm:grid-cols-2 gap-x-7.5 xl:gap-x-6 lg:gap-x-5 md:gap-x-4 gap-y-10 2xl:gap-y-9 xl:gap-y-8 lg:gap-y-7 md:gap-y-6">
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            +1,687</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.contacted_customers') }}

                        </div>
                    </div>
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            +548</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.hosted_customers') }}
                        </div>
                    </div>
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            42</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.digital_contracts') }}
                        </div>
                    </div>
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            2,670m2</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.properties') }}
                        </div>
                    </div>
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            +655</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.shown_places') }}
                        </div>
                    </div>
                    <div class="item grid gap-1.5">
                        <div
                            class="value text-10 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-secondary-700 leading-tight text-center">
                            +846</div>
                        <div
                            class="title text-4 xl:text-3.5 sm:text-3 font-medium text-[#6D6D6D] leading-tight text-center">
                            {{ __('general.drunk_coffee') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="loca-tv-field bg-white py-20 2xl:py-16 xl:py-12 lg:py-8">
        <div class="wrapper max-w-1440 mx-auto w-full px-7.5">
            <h3 class="title flex items-center justify-center gap-3">
                <div class="text text-11 2xl:text-9 xl:text-8 lg:text-6 md:text-5 font-semibold text-tertiary-950">
                    Loca</div>
                <img class="w-14 xl:w-12 lg:w-10 sm:w-8 aspect-square object-contain object-center block"
                    src="{{ asset('image/static/1.webp') }}" alt="" loading="lazy">
            </h3>
            <div class="text-editor text-editor-main mt-3">
                <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                <p style="text-align:center;color:#0D1523">
                    {{ __('general.loca_tv_1') }}
                </p>
                <p style="text-align:center;">
                    {{ __('general.loca_tv_2') }}
                </p>
            </div>
            <div
                class="tags flex items-center justify-center flex-wrap gap-x-10 2xl:gap-x-9 xl:gap-x-8 lg:gap-x-6 md:gap-x-4 gap-y-3 md:gap-y-2 mt-13 2xl:mt-11 xl:mt-9 lg:mt-7">

                @foreach ($videoCategories as $videoCategory)
                    <a href="{{ route('videos') }}" class="flex items-center gap-3 md:gap-2 group">
                        <div
                            class="icon icon-check text-3.5 h-3.5 md:text-3 md:h-3 block leading-none duration-300 text-secondary-700">
                        </div>
                        <div
                            class="text text-4.5 xl:text-4 md:text-3.5 font-medium text-tertiary-950 duration-300 group-hover:text-secondary-700">
                            {{ $videoCategory->name }}
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
        <div class="carousel-wrapper relative my-20 2xl:my-16 xl:my-12 lg:my-8 sm:px-5">
            <div
                class="video-carousel swiper !h-auto w-full [mask-image:linear-gradient(90deg,transparent_5%,black_25%,black_75%,transparent_95%)] sm:[mask-image:unset]">
                <div class="swiper-wrapper !h-auto">
                    @foreach ($videos as $video)
                        <div class="swiper-slide group/slide">
                            <div>
                                <iframe width="400" height="300" style="border-radius: 10px"
                                    src="{{ str_replace('/watch?v=', '/embed/', $video->url) }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <div
                                    class="title text-center text-4.5 xl:text-4 md:text-3.5 font-semibold text-tertiary-950 leading-tight px-4 pt-4 duration-300 group-hover:text-main-700">
                                    {{ $video->title }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="navigation-wrapper pointer-events-none z-6 absolute left-0 top-0 w-full h-full">
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5 h-full flex items-center justify-between">
                    <div
                        class="video-prev cursor-pointer shadow-s2 bg-white w-17 2xl:w-15 xl:w-13 lg:w-11 md:w-9 aspect-square rounded-full flex items-center justify-center text-tertiary-950 hover:bg-[#144495] hover:text-white pointer-events-auto duration-300">
                        <div
                            class="icon icon-chevron-left text-4 h-4 xl:text-3.5 xl:h-3.5 lg:text-3 lg:h-3 md:text-2.5 md:h-2.5 block leading-none">
                        </div>
                    </div>
                    <div
                        class="video-next cursor-pointer shadow-s2 bg-white w-17 2xl:w-15 xl:w-13 lg:w-11 md:w-9 aspect-square rounded-full flex items-center justify-center text-tertiary-950 hover:bg-[#144495] hover:text-white pointer-events-auto duration-300">
                        <div
                            class="icon icon-chevron-right text-4 h-4 xl:text-3.5 xl:h-3.5 lg:text-3 lg:h-3 md:text-2.5 md:h-2.5 block leading-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper max-w-1440 mx-auto w-full px-7.5">
            <a href="{{ route('videos') }}"
                class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-14 md:h-12 w-fit mx-auto px-14 2xl:px-12 xl:px-10 lg:px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">

                <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">

                    {{ __('general.show_all') }}
                </div>

            </a>
        </div>
    </section>

@endsection
