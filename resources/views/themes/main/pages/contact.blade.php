@extends('layouts.frontend')

@section('title', ' İletişim | RE/MAX Loca')
@section('content')

    <main class="main-field relative pt-[134px] sm:pt-[124px]">

        <section class="breadcrumb-field px-7 md:px-5">
            <div
                class="inner bg-[#8AA5D3]/15 rounded-6 md:rounded-4 pt-28 2xl:pt-24 xl:pt-18 lg:pt-12 md:pt-10 pb-32 2xl:pb-28 xl:pb-22 lg:pb-16 md:pb-10">
                <div class="wrapper max-w-1440 mx-auto w-full px-7.5">
                    <div class="text-editor !gap-2 md:text-center">
                        <!-- .text-editor içerisindeki style attribute değerleri frontendi tasarıma benzetmek adına eklenmiştir, backend aşamasında silinerek panel editöründen tanımlanmalıdır. -->
                        <h2 style="color:#224391;"><strong>
                                {{ __('general.contact_us') }}
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-field -mt-8 pb-15 2xl:pb-14 xl:pb-13 lg:pb-12 md:pb-11 md:pt-11 sm:pb-10 sm:pt-10">
            <div class="wrapper max-w-1440 mx-auto w-full px-7.5 md:px-5 grid grid-cols-2 md:grid-cols-1 md:gap-6">
                <div class="contact-wrapper grid gap-3">
                    <div
                        class="box rounded-6 md:!rounded-3 !rounded-tr-0 !rounded-br-0  bg-gradient-to-tr from-[#182F56] to-tertiary-950 py-11 2xl:py-9 xl:py-7 px-16 2xl:px-12 xl:px-10 md:px-7.5">
                        <div class="title text-white text-5 xl:text-4.5 lg:text-4 font-semibold mb-6 xl:mb-5 lg:mb-4">
                            Merkez Ofis</div>
                        <div class="detail-wrapper grid grid-cols-2 sm:grid-cols-1 gap-6">
                            <div class="inner grid gap-8 2xl:gap-6 xl:gap-4">
                                <div class="item-wrapper">
                                    <a href="https://maps.app.goo.gl/KYeR8YfndhggKMDB8"
                                        class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                        <div
                                            class="icon icon-location-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                        </div>
                                        <div class="text-wrapper">
                                            <div class="title text-3 text-white">{{ __('general.address') }}</div>
                                            <div class="text text-white text-3.5 font-medium"><span
                                                    class="draw-el">Dumlupınar Mahallesi.1524 Sokak. Oğuz İş Merkezi
                                                    No:2/1 Yenişehir / Mersin</span></div>
                                        </div>
                                    </a>
                                    <div class="button-wrapper ml-4 pl-5 mt-3">
                                        <a href="https://maps.app.goo.gl/KYeR8YfndhggKMDB8"
                                            class="button group/button relative duration-300 w-fit flex items-center gap-2 h-8.5 border border-solid border-[#8AA5D3]/25 px-3 rounded-2 hover:border-[#8AA5D3]/50">
                                            <div
                                                class="icon icon-map-1 text-3 h-3 block leading-none duration-300 text-[#2675FA]">
                                            </div>
                                            <div class="text text-white font-semibold text-3.5 tracking-wider">
                                                {{ __('general.directions') }}
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <a href="mailto:info@remax-loca-mrs.com"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-email-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white">{{ __('general.email') }}</div>
                                        <div class="text text-white text-3.5 font-medium"><span
                                                class="draw-el">info@remax-loca-mrs.com</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="split h-px w-full bg-white/10 hidden sm:block"></div>
                            <div class="inner grid gap-5 2xl:gap-4 xl:gap-3 justify-end sm:justify-start">
                                <a href="tel:+90 (324) 325 30 30"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-headset-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">
                                            {{ __('general.customer_services') }}</div>
                                        <div class="text text-white text-4 font-medium"><span class="draw-el">+90 (324)
                                                325 30 30</span></div>
                                    </div>
                                </a>
                                <a href="tel:+90 (532) 427 59 36"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-cellphone-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">{{ __('general.phone') }} 1</div>
                                        <div class="text text-white text-4 font-medium"><span class="draw-el">+90 (532)
                                                427 59 36</span></div>
                                    </div>
                                </a>
                                <a href="tel:+90 (533)140 36 29"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-cellphone-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">{{ __('general.phone') }} 2</div>
                                        <div class="text text-white text-4 font-medium"><span class="draw-el">+90 (533)140
                                                36 29</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="box rounded-6 md:!rounded-3 !rounded-tr-0 !rounded-br-0  bg-gradient-to-tr from-[#182F56] to-tertiary-950 py-11 2xl:py-9 xl:py-7 px-16 2xl:px-12 xl:px-10 md:px-7.5">
                        <div class="title text-white text-5 xl:text-4.5 lg:text-4 font-semibold mb-6 xl:mb-5 lg:mb-4">
                            Tece Ofis</div>
                        <div class="detail-wrapper grid grid-cols-2 sm:grid-cols-1 gap-6">
                            <div class="inner grid gap-8 2xl:gap-6 xl:gap-4">
                                <div class="item-wrapper">
                                    <a href="https://maps.app.goo.gl/KYeR8YfndhggKMDB8"
                                        class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                        <div
                                            class="icon icon-location-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                        </div>
                                        <div class="text-wrapper">
                                            <div class="title text-3 text-white">{{ __('general.address') }}</div>
                                            <div class="text text-white text-3.5 font-medium"><span class="draw-el">Deniz
                                                    Mahallesi, Gazipaşa Cadddesi, Akbusi Sitesi AltıNo:56/B Mezitli /
                                                    Mersin</span></div>
                                        </div>
                                    </a>
                                    <div class="button-wrapper ml-4 pl-5 mt-3">
                                        <a href="https://maps.app.goo.gl/KYeR8YfndhggKMDB8"
                                            class="button group/button relative duration-300 w-fit flex items-center gap-2 h-8.5 border border-solid border-[#8AA5D3]/25 px-3 rounded-2 hover:border-[#8AA5D3]/50">
                                            <div
                                                class="icon icon-map-1 text-3 h-3 block leading-none duration-300 text-[#2675FA]">
                                            </div>
                                            <div class="text text-white font-semibold text-3.5 tracking-wider">

                                                {{ __('general.directions') }}
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <a href="mailto:info@remax-loca-mrs.com"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-email-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white">{{ __('general.email') }}</div>
                                        <div class="text text-white text-3.5 font-medium"><span
                                                class="draw-el">info@remax-loca-mrs.com</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="split h-px w-full bg-white/10 hidden sm:block"></div>
                            <div class="inner grid gap-5 2xl:gap-4 xl:gap-3 justify-end sm:justify-start">
                                <a href="tel:+90 (324)325 30 30"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-headset-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">
                                            {{ __('general.customer_services') }}
                                        </div>
                                        <div class="text text-white text-4   font-medium"><span class="draw-el">+90 (324)325
                                                30 30</span></div>
                                    </div>
                                </a>
                                <a href="tel:+90 (532)427 59 36"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-cellphone-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">{{ __('general.phone') }} 1</div>
                                        <div class="text text-white text-4 font-medium"><span class="draw-el">+90 (532)427
                                                59 36</span></div>
                                    </div>
                                </a>
                                <a href="tel:+90 (533)140 36 29"
                                    class="flex items-start gap-4 draw-child-underline [--line-color:#FFFFFF]">
                                    <div
                                        class="icon icon-cellphone-2 text-6 h-6 block leading-none duration-300 text-[#2675FA] translate-y-15/100">
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title text-3 text-white capitalize">{{ __('general.phone') }} 2</div>
                                        <div class="text text-white text-4 font-medium"><span class="draw-el">+90 (533)140
                                                36 29</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="form-wrapper bg-white rounded-6 md:!rounded-3 !rounded-tl-0 !rounded-bl-0 py-11 2xl:py-9 xl:py-7 px-16 2xl:px-12 xl:px-10 md:px-7.5 flex items-center">
                    <div class="inner max-w-[425px] md:max-w-none w-full mx-auto">
                        <div class="title text-5 xl:text-4.5 lg:text-4 font-semibold text-tertiary-950 mb-5">
                            {{ __('general.contact_us') }}
                        </div>
                        <form action="{{ route('form.contact') }}" method="post">
                            @csrf
                            <div class="form-wrapper grid gap-3">
                                <div class="form-el relative group/form w-full">
                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                    <input required name="name" type="text" placeholder="{{ __('general.name') }}"
                                        class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">

                                    @error('name')
                                        <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-el relative group/form w-full">
                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                    <input required name="email" type="email"
                                        placeholder="{{ __('general.email') }}"
                                        class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">
                                    @error('email')
                                        <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-el relative group/form w-full">
                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                    <input required name="phone" type="tel"
                                        placeholder="{{ __('general.phone') }}"
                                        class="w-full h-14 md:h-12 duration-300 rounded-4 md:rounded-3 px-7 md:px-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700">
                                    @error('phone')
                                        <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-el group/form w-full">
                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                    <textarea required name="message" placeholder="{{ __('general.message') }}"
                                        class="w-full h-28 md:h-20 duration-300 rounded-4 md:rounded-3 p-7 md:p-5 bg-bodyColor placeholder:text-[#6D6D6D] text-tertiary-950 font-medium text-3.5 border border-solid border-transparent hover:border-[#8AA5D3]/30 focus:border-main-700 group-[&.error]/form:border-secondary-700"></textarea>
                                    @error('message')
                                        <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-el group/form w-full px-2 my-3 md:my-2">
                                    <!-- Buraya `error` classı gelince ilgili style değişiyor -->
                                    <div class="custom-input relative flex items-center gap-2">
                                        <input required name="agree" type="checkbox"
                                            class="opacity-0 absolute left-0 top-0 w-full h-full peer z-2 cursor-pointer">
                                        <div
                                            class="box relative duration-300 w-4 aspect-square shrink-0 bg-bodyColor rounded-0.75 border border-solid border-[#8AA5D3]/30 before:absolute before:left-1/2 before:top-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-65/100 before:aspect-square before:rounded-0.5 before:bg-main-700 before:duration-300 before:pointer-events-none before:opacity-0 peer-hover:border-main-700 peer-checked:border-main-700 peer-checked:before:opacity-100">
                                        </div>
                                        <div class="text text-[#6D6D6D] text-3.5 font-medium"><a href="#popup-gdpr"
                                                data-fancybox
                                                class="text-[#6D6D6D] font-semibold duration-300 hover:text-main-700 relative z-3">KVKK</a>
                                            ve <a href="#popup-gdpr" data-fancybox
                                                class="text-[#6D6D6D] font-semibold duration-300 hover:text-main-700 relative z-3">Gizlilik
                                                Şartları</a>’nı okudum, kabul ediyorum.</div>
                                    </div>
                                    <div class="tooltip text-secondary-700 text-3 mt-2 hidden group-[&.error]/form:block">
                                        Lütfen ilgili alanı doldurunuz.</div>
                                </div>
                                <div class="form-el group/form w-full">
                                    <!-- Buraya `loading` classı gelince ilgili style değişiyor -->
                                    <button
                                        class="button group/button relative flex items-center justify-center gap-4 md:gap-3 duration-300 rounded-5 md:rounded-3 after:absolute after:left-[calc(50%-13px)] xl:after:left-[calc(50%-12px)] md:after:left-[calc(50%-10px)] after:top-[calc(50%-13px)] xl:after:top-[calc(50%-12px)] md:after:top-[calc(50%-10px)] after:h-6.5 xl:after:h-6 md:after:h-5 after:aspect-square after:rounded-full after:border-0.5 after:border-solid after:border-white after:[clip-path:polygon(0%_0%,100%_0%,100%_50%,0%_50%)] after:opacity-0 after:duration-300 after:transition-opacity after:animate-spin group-[&.loading]/form:[&_.icon]:opacity-0 group-[&.loading]/form:[&_.text]:opacity-0 group-[&.loading]/form:after:opacity-100 group-[&.loading]/form:pointer-events-none h-16 xl:h-14 md:h-12 w-full px-8 sm:px-6 bg-secondary-700 hover:bg-secondary-600 text-white">

                                        <div
                                            class="text whitespace-nowrap font-medium text-4 md:text-3.5 transition-opacity duration-300">
                                            {{ __('general.submit') }}</div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
