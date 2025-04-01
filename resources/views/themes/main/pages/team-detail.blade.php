@extends('layouts.frontend')

@section('title', $user->name . ' | RE/MAX Loca')
@section('content')

    <soho-technologies class="block">

        <main class="main-field relative pt-[134px] sm:pt-[124px]" x-data="{
            comments: [],
            nextPageUrl: null,
            quickFilter(url) {
                window.location.href = url
            },
            fetchComments(url = `{{ route('user.comments', $user) }}`, isMore = false) {
                const self = this;
                axios.get(url).then(res => {
                        self.nextPageUrl = res.data.next_page_url
                        console.log(self.nextPageUrl)
                        if (!isMore) {
                            self.comments = res.data.data
                            console.log(res.data.data);
                            return;
                        }
                        self.comments = self.comments.concat(res.data.data)
                    })
                    .catch(err => {
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

                            {{ __('general.team') }}</h1>
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
            <section class="team-detail-field py-20 2xl:py-16 xl:py-14 lg:py-12 md:py-11 sm:py-10">
                <div
                    class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 grid grid-cols-[minmax(0,35fr)_minmax(0,85fr)] md:grid-cols-1 gap-8">
                    <div class="sidebar-wrapper">
                        <div class="sticky-el sticky top-0 duration-300">
                            <div class="inner-wrapper bg-white rounded-6 md:rounded-3 p-7">
                                <div
                                    class="image aspect-[73/97] overflow-hidden isolate rounded-8 xl:rounded-6 md:rounded-3">
                                    <img class="full-cover" src="{{ $user->media->first()?->original_url }}" alt=""
                                        loading="lazy">
                                </div>
                                <div class="content-wrapper p-7 xl:px-5 lg:px-3">
                                    <div
                                        class="name capitalize text-5.5 xl:text-5 lg:text-4.5 md:text-4 font-medium text-tertiary-950">
                                        {{ $user->name }}

                                    </div>
                                    <div class="position font-medium text-4.5 xl:text-4 lg:text-3.5 text-[#6D6D6D]">

                                        {{ $user->title }}
                                    </div>
                                    <div class="social-wrapper flex items-center gap-3.5 mt-5 xl:mt-4.5 lg:mt-4 md:mt-3.5">
                                        <a href="{{ $user->facebook_url }}"
                                            class="block relative text-[#224391] duration-350 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:pointer-events-none before:w-150/100 before:aspect-square before:rounded-1 before:-rotate-90 before:opacity-0 before:duration-350 before:bg-[#224391] hover:before:rotate-0 hover:before:opacity-100 hover:text-white">
                                            <div class="icon icon-facebook-1 text-4 h-4 block leading-none relative z-2">
                                            </div>
                                        </a>
                                        <a href="{{ $user->instagram_url }}"
                                            class="block relative text-[#224391] duration-350 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:pointer-events-none before:w-150/100 before:aspect-square before:rounded-1 before:-rotate-90 before:opacity-0 before:duration-350 before:bg-[#224391] hover:before:rotate-0 hover:before:opacity-100 hover:text-white">
                                            <div class="icon icon-instagram text-4 h-4 block leading-none relative z-2">
                                            </div>
                                        </a>
                                        <a href="{{ $user->youtube }}"
                                            class="block relative text-[#224391] duration-350 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:pointer-events-none before:w-150/100 before:aspect-square before:rounded-1 before:-rotate-90 before:opacity-0 before:duration-350 before:bg-[#224391] hover:before:rotate-0 hover:before:opacity-100 hover:text-white">
                                            <div class="icon icon-youtube text-4 h-4 block leading-none relative z-2">
                                            </div>
                                        </a>
                                        <a href="{{ $user->linkedin }}"
                                            class="block relative text-[#224391] duration-350 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:pointer-events-none before:w-150/100 before:aspect-square before:rounded-1 before:-rotate-90 before:opacity-0 before:duration-350 before:bg-[#224391] hover:before:rotate-0 hover:before:opacity-100 hover:text-white">
                                            <div class="icon icon-linkedin-1 text-4 h-4 block leading-none relative z-2">
                                            </div>
                                        </a>
                                        <a target="_blank"
                                            href="https://api.whatsapp.com/send/?phone={{ $user->whatsapp }}"
                                            class="block relative text-[#224391] duration-350 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:pointer-events-none before:w-150/100 before:aspect-square before:rounded-1 before:-rotate-90 before:opacity-0 before:duration-350 before:bg-[#8AA5D3] hover:before:rotate-0 hover:before:opacity-100 hover:text-tertiary-950">
                                            <div class="icon icon-whatsapp-1 text-4 h-4 block leading-none relative z-2">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="info bg-[#E8F0FD] rounded-4 flex items-center justify-evenly flex-wrap gap-2 p-5 xl:p-4">
                                    <a href="{{ $user->address }}"
                                        class="flex items-center gap-2 text-[#224391] duration-300 hover:text-[#2675FA]">
                                        <div class="icon icon-map-2 text-4 h-4 block leading-none"></div>
                                        <div class="text text-3.5 font-medium">{{ __('general.office_location') }}</div>
                                    </a>
                                    <a href="{{ $user->office_location }}"
                                        class="flex items-center gap-2 text-[#224391] duration-300 hover:text-[#2675FA]">
                                        <div class="icon icon-location-1 text-4 h-4 block leading-none"></div>
                                        <div class="text text-3.5 font-medium">{{ __('general.address_info') }}</div>
                                    </a>
                                </div>
                                <div class="content-wrapper p-7 xl:px-5 lg:px-3 pb-0 grid gap-3.5">
                                    <a href="tel:{{ $user->phone }}"
                                        class="flex items-center gap-5 xl:gap-4 lg:gap-3 md:gap-2 text-[#224391] duration-300 hover:text-[#2675FA]">
                                        <div
                                            class="icon icon-cellphone-1 text-4.5 h-4.5 xl:text-4 xl:h-4 block leading-none">
                                        </div>
                                        <div class="text text-3.5 font-medium">{{ $user->phone }}</div>
                                    </a>
                                    <a href="mailto:{{ $user->email }}"
                                        class="flex items-center gap-5 xl:gap-4 lg:gap-3 md:gap-2 text-[#224391] duration-300 hover:text-[#2675FA]">
                                        <div class="icon icon-email-1 text-4.5 h-4.5 xl:text-4 xl:h-4 block leading-none">
                                        </div>
                                        <div class="text text-3.5 font-medium">{{ $user->email }}</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrapper bg-white rounded-6 md:rounded-3 p-4">
                        <div class="tab-wrapper flex items-center justify-between md:flex-col relative -my-4 md:-mt-8">
                            <div
                                class="tab-triggers inner flex items-center w-fit max-w-full p-1 overflow-y-hidden overflow-x-auto isolate before:absolute before:left-1/2 before:top-1/2 before:w-full before:h-15 lg:before:h-12 before:bg-[#E8F0FD] before:-translate-y-1/2 before:-translate-x-1/2 before:rounded-4 scrollbar-none">
                                <button data-id="tab1"
                                    class="item group relative rounded-4 h-13 lg:h-10 px-6 lg:px-4 flex items-center justify-center duration-300 [&.active]:bg-white [&.active]:shadow-s2 my-4 md:mt-9 @if (!request('filter')) active @endif">
                                    <div
                                        class="text text-[#6D6D6D] text-4 lg:text-3.5 font-medium whitespace-nowrap duration-300 group-hover:text-tertiary-950 group-[&.active]:text-tertiary-950">
                                        {{ __('general.bio') }}
                                    </div>
                                </button>
                                <button data-id="tab2"
                                    class="item group relative rounded-4 h-13 lg:h-10 px-6 lg:px-4 flex items-center justify-center duration-300 [&.active]:bg-white [&.active]:shadow-s2 my-4 md:mt-9 @if (request('filter')) active @endif">
                                    <div
                                        class="text text-[#6D6D6D] text-4 lg:text-3.5 font-medium whitespace-nowrap duration-300 group-hover:text-tertiary-950 group-[&.active]:text-tertiary-950">
                                        {{ __('general.portfolios') }}
                                    </div>
                                </button>
                                <button data-id="tab3" @click="fetchComments(`{{ route('user.comments', $user) }}`)"
                                    class="item group relative rounded-4 h-13 lg:h-10 px-6 lg:px-4 flex items-center justify-center duration-300 [&.active]:bg-white [&.active]:shadow-s2 my-4 md:mt-9">
                                    <div
                                        class="text text-[#6D6D6D] text-4 lg:text-3.5 font-medium whitespace-nowrap duration-300 group-hover:text-tertiary-950 group-[&.active]:text-tertiary-950">
                                        {{ __('general.comments') }}
                                    </div>
                                </button>
                            </div>
                            <div class="link-wrapper relative z-2 flex items-center px-8 gap-10 xl:gap-8 lg:gap-6 md:gap-4">
                                <a href="#popup-comment"
                                    class="flex items-center gap-2 text-[#224391] duration-300 hover:text-[#2675FA]"
                                    data-fancybox>
                                    <div class="icon icon-comment text-4 h-4 block leading-none"></div>
                                    <div class="text text-3.5 font-medium">{{ __('general.add_comments') }}</div>
                                </a>
                                <a href="#popup-share-team"
                                    class="flex items-center gap-2 text-[#224391] duration-300 hover:text-[#2675FA]"
                                    data-fancybox>
                                    <div class="icon icon-share text-4 h-4 block leading-none"></div>
                                    <div class="text text-3.5 font-medium">
                                        {{ __('general.share') }}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <section id="popup-comment"
                            class="hidden !bg-white !rounded-6 md:!rounded-3 !m-0 !p-0 !max-w-[620px] w-full">
                            <div class="inner w-full p-11 2xl:p-10 xl:p-8 lg:p-6">
                                <div class="heading flex items-center justify-between gap-7.5">
                                    <div class="title text-4 font-medium text-[#2675FA]">Yorum Yapın/Değerlendirin</div>
                                    <div
                                        class="custom-fancybox-close-button group cursor-pointer relative before:absolute before:w-7.5 before:aspect-square before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2">
                                        <div
                                            class="icon icon-cross text-3 h-3 block leading-none duration-300 text-tertiary-950 group-hover:rotate-90 group-hover:text-[#2675FA]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outer-wrapper mt-7.5">
                                    <form action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                        <div class="form-inner-wrapper grid grid-cols-2 sm:grid-cols-1 gap-5">
                                            <div class="form-el group/form w-full col-span-2 sm:col-span-1">
                                                <input name="name" type="text"
                                                    placeholder="{{ __('general.name') }}"
                                                    class="w-full h-13 md:h-12 duration-300 rounded-3 px-5 bg-transparent placeholder:text-[#8AA5D3] text-tertiary-950 font-medium text-3.5 border border-solid border-[#E8F0FD] hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen
                                                    ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el group/form w-full col-span-2 sm:col-span-1 px-2">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <div class="custom-input relative flex items-center gap-2">
                                                    <input name="show_name" type="checkbox" value="0"
                                                        class="opacity-0 absolute left-0 top-0 w-full h-full peer z-2 cursor-pointer">
                                                    <div
                                                        class="box relative duration-300 w-4 aspect-square shrink-0 bg-bodyColor rounded-0.75 border border-solid border-[#8AA5D3]/30 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                                    </div>
                                                    <div class="text text-[#6D6D6D] text-3.5 font-medium">
                                                        {{ __('general.hide_name') }}</div>
                                                </div>
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen
                                                    ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <input name="phone" type="tel" placeholder="Telefon"
                                                    class="w-full h-13 md:h-12 duration-300 rounded-3 px-5 bg-transparent placeholder:text-[#8AA5D3] text-tertiary-950 font-medium text-3.5 border border-solid border-[#E8F0FD] hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen
                                                    ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el group/form w-full">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <input name="email" type="email"
                                                    placeholder="{{ __('general.email') }}"
                                                    class="w-full h-13 md:h-12 duration-300 rounded-3 px-5 bg-transparent placeholder:text-[#8AA5D3] text-tertiary-950 font-medium text-3.5 border border-solid border-[#E8F0FD] hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen
                                                    ilgili alanı doldurunuz.</div>
                                            </div>
                                            <div class="form-el group/form w-full col-span-2 sm:col-span-1">
                                                <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                                <textarea name="comment" placeholder="{{ __('general.comments') }}"
                                                    class="w-full h-28 md:h-20 duration-300 rounded-3 p-5 bg-transparent placeholder:text-[#8AA5D3] text-tertiary-950 font-medium text-3.5 border border-solid border-[#E8F0FD] hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700"></textarea>
                                                <div
                                                    class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                                    Lütfen
                                                    ilgili alanı doldurunuz.</div>
                                            </div>

                                            <div class="form-el group/form w-full col-span-2 sm:col-span-1">
                                                <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                                <button
                                                    class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none h-13 md:h-12 w-fit mr-0 ml-auto px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">

                                                    <div
                                                        class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                                        {{ __('general.submit') }}
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <div class="item-wrapper tab-panels">
                            <div data-id="tab1"
                                class="item hidden [&.active]:block p-8 md:px-4 pt-12 @if (!request('filter')) active @endif">
                                <div class="text-editor text-editor-main">
                                    <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                                    <h5>We Are <strong>LOCA</strong></h5>
                                    <p style="color:#0D1523">
                                        {!! $user->bio !!}
                                    </p>


                                </div>

                                <div class="split h-px w-full my-8 xl:my-7 lg:my-6 md:my-4 bg-[#E8F0FD]"></div>

                                @if ($user->experience)
                                    <div class="info">
                                        <div
                                            class="title capitalize text-4 font-semibold text-[#224391] mb-7 xl:mb-6 lg:mb-5 md:mb-4">
                                            {{ __('general.experience') }}
                                        </div>
                                        <div class="list flex items-center flex-wrap gap-4 lg:gap-3 md:gap-2">
                                            @foreach ($user->experience as $experience)
                                                <p href="javascript:void(0)"
                                                    class="bg-[#F2F8FD] h-11 lg:h-10 md:h-9 rounded-4 md:rounded-3 font-medium text-tertiary-950 text-3.5 text-center flex items-center justify-center px-5 lg:px-4.5 md:px-4 duration-300 hover:bg-main-100">
                                                    {{ $experience }} </p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                @endif
                                @if ($user->experience)
                                    <div class="info">
                                        <div
                                            class="title capitalize text-4 font-semibold text-[#224391] mb-7 xl:mb-6 lg:mb-5 md:mb-4">
                                            {{ __('general.experience_area') }}
                                        </div>
                                        <div class="list flex items-center flex-wrap gap-4 lg:gap-3 md:gap-2">
                                            @foreach ($user->experience_area as $experienceArea)
                                                <p href="javascript:void(0)"
                                                    class="bg-[#F2F8FD] h-11 lg:h-10 md:h-9 rounded-4 md:rounded-3 font-medium text-tertiary-950 text-3.5 text-center flex items-center justify-center px-5 lg:px-4.5 md:px-4 duration-300 hover:bg-main-100">
                                                    {{ $experienceArea }} </p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="split h-px w-full my-8 xl:my-7 lg:my-6 md:my-4 bg-[#E8F0FD]"></div>

                                <div class="info">
                                    <div class="title text-4 font-semibold text-[#224391] mb-3">
                                        {{ __('general.languages') }}</div>
                                    <div class="text-editor text-editor-main">
                                        @if ($user->languages)
                                            <p style="color:#0D1523" class="capitalize">
                                                {{ implode(',', $user->languages) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div data-id="tab2"
                                class="item hidden [&.active]:block p-4 pt-12 pb-8 @if (request('filter')) active @endif ">
                                <div
                                    class="filter-wrapper grid grid-cols-[minmax(0,5fr)_minmax(0,4fr)_minmax(0,5fr)] sm:grid-cols-1 gap-5.5 sm:gap-3">
                                    <div class="form-el group/form relative w-full">

                                        <div
                                            class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            Lütfen ilgili alanı doldurunuz.</div>
                                    </div>
                                    <div class="form-el group/form relative w-full">

                                        <div
                                            class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            Lütfen ilgili alanı doldurunuz.</div>
                                    </div>
                                    <div class="form-el group/form relative w-full">
                                        <!-- Buraya `error` classı gelince ilgili style değişiyor -->


                                        <div
                                            class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            Lütfen ilgili alanı doldurunuz.</div>
                                    </div>
                                </div>
                                <div class="list-wrapper mt-10 2xl:mb-9 xl:mt-8 lg:mt-6 grid gap-7">
                                    @foreach ($portfolios as $portfolio)
                                        <a href="{{ route('frontend.portfolio.show', $portfolio) }}"
                                            class="item grid grid-cols-[minmax(0,300px)_minmax(0,auto)] sm:grid-cols-1 gap-11 2xl:gap-9 xl:gap-7.5 lg:gap-6 sm:gap-2 items-center border border-solid border-[#E8F0FD] rounded-6 md:rounded-3 p-2 duration-300 hover:border-[#2675FA]">
                                            <div
                                                class="image-wrapper relative aspect-[10/7] rounded-6 md:rounded-3 overflow-hidden isolate translate-z-0 shadow-s3">
                                                <img class="full-cover"
                                                    src="{{ $portfolio->images?->first()?->full_url }}" alt=""
                                                    loading="lazy">
                                                <div
                                                    class="tag absolute left-4 top-4 bg-tertiary-950/50 rounded-2 px-2 py-1.5 text-white text-3 font-medium leading-none capitalize">
                                                    {{ $portfolio->category?->rootAncestor?->name }}
                                                </div>
                                            </div>
                                            <div class="text-wrapper py-6 pr-6 sm:p-4">
                                                <div class="tags flex flex-wrap items-center gap-4">
                                                    <div class="item flex items-center gap-2">
                                                        <div
                                                            class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                            <div
                                                                class="icon icon-location-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                            </div>
                                                        </div>
                                                        <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                            {{ $portfolio->full_address }}
                                                        </div>
                                                    </div>

                                                    <div class="item flex items-center gap-2">
                                                        <div
                                                            class="icon-wrapper w-7.5 aspect-square shrink-0 bg-[#EDF3FE] flex items-center justify-center rounded-full">
                                                            <div
                                                                class="icon icon-square-meter-1 text-3.5 h-3.5 block leading-none duration-300 text-[#2675FA]">
                                                            </div>
                                                        </div>
                                                        <div class="text text-3.5 font-medium text-tertiary-950/40">
                                                            {{ $portfolio->net }} m²</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="title text-tertiary-950 font-semibold text-5 xl:text-4.5 lg:text-4 mt-4">
                                                    {{ $portfolio->title }}
                                                </div>
                                                <div
                                                    class="price text-tertiary-950 flex items-center gap-1 mt-3 sm:flex-col sm:items-start sm:gap-0">
                                                    <div
                                                        class="value font-semibold text-6 2xl:text-5.5 xl:text-5 lg:text-4.5 md:text-4">
                                                        {{ $portfolio->price }} </div>
                                                    <div class="joint text-4 xl:text-3.5 font-medium">
                                                        {{ __('general.general.starting_price') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>

                                <a href="{{ route('portfolios', ['filter[user_id]' => $user->id]) }}"
                                    class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-16 xl:h-14 md:h-12 w-fit mx-auto px-30 2xl:px-24 xl:px-16 lg:px-12 md:px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 mt-7.5 text-white">

                                    <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">
                                        {{ __('general.show_more') }}
                                    </div>

                                </a>
                            </div>
                            <div data-id="tab3" class="item hidden [&.active]:block p-4 pt-12 pb-8">

                                <div class="list-wrapper grid gap-7">
                                    <template x-for="comment in comments">
                                        <div class="comment bg-[#F0F2F7] rounded-5 md:rounded-3 px-8 lg:px-6 py-6">
                                            <div class="name text-4 font-semibold text-[#224391] capitalize"
                                                x-text="comment.formatted_name"></div>

                                            <div class="text-editor mt-3 capitalize">
                                                <p x-text="comment.comment"></p>
                                            </div>
                                            <div class="date text-[#8AA5D3] text-3.5 font-medium mt-5"
                                                x-text="comment.formatted_date"></div>
                                        </div>
                                    </template>
                                </div>

                                <button @click="fetchComments(nextPageUrl,true)" x-show="nextPageUrl"
                                    class="button group/button flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 h-16 xl:h-14 md:h-12 w-fit mx-auto px-30 2xl:px-24 xl:px-16 lg:px-12 md:px-8 sm:px-6 bg-[#2675FA] hover:bg-main-500 mt-7.5 text-white">

                                    <div class="text whitespace-nowrap font-medium text-4 md:text-3.5">
                                        {{ __('general.show_more') }}
                                    </div>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        @include('team.share', ['user' => $user])

    </soho-technologies>
@endsection
<script>
    @session('success')
    alert('Yorumunuz için teşekkürler')
    @endsession
</script>
