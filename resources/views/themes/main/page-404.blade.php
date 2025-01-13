@include('themes.main.header')

<main id="page-template" class="header-space">
    <section class="breadcrumb">
        <div class="background"><img src="assets/images/breadcrumb/image-3.jpg" alt=""></div>
        <div class="content">
            <div class="container">
                <h1>Sayfa Bulunamadı</h1>
            </div>
        </div>
    </section>

    <article class="inner">
        <div class="container container--narrowest">
            <div class="page-not-found type">
                <h1><strong><span class="gradient-text">404</span></strong></h1>
                <h4>Sayfa Bulunamadı</h4>
                <p>Aradığınız sayfa bulunamadı, anasayfaya dönmek için aşağıdaki butona tıklayabilirsiniz</p>

                <button
                    class="button color--maximum-red-bg size--fit size--wide icon--small icon--right animation--arrow-right">
                    <span>Anasayfaya Dön</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.14 14.14">
                        <path
                            d="M14.08,7.36a.73.73,0,0,0,0-.58s0,0-.05-.08a.91.91,0,0,0-.11-.16L7.6.22A.75.75,0,0,0,6.54,1.28l5,5H.75a.75.75,0,0,0,0,1.5H11.58l-5,5a.75.75,0,0,0,0,1.06.75.75,0,0,0,1.06,0L13.92,7.6A.91.91,0,0,0,14,7.44S14.07,7.39,14.08,7.36Z" />
                    </svg>
                </button>
            </div>
        </div>
    </article>
</main>

@include('themes.main.footer')
