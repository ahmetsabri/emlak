@include('themes.main.header')

<main id="page-portfolio" class="header-space">
    <section class="breadcrumb">
        <div class="background"><img src="assets/images/breadcrumb/image-5.jpg" alt=""></div>
        <div class="content">
            <div class="container">
                <h1>Portfolio</h1>
            </div>
        </div>
    </section>

    <article class="inner">
        <div class="container">
            <div class="portfolio-filter mb--30">
                <div class="filter">
                    <div class="wrapper mb--30">
                        <form action="">
                            <div class="form">
                                <div class="item width--2">
                                    <label>Portföy Arama</label>
                                    <input type="text" placeholder="Örn: 3+1 Satılık veya İlan No">
                                </div>
                                <div class="item width--2 custom-select">
                                    <label>Portföy Tipi</label>
                                    <select>
                                        <option>Konut</option>
                                        <option>Daire</option>
                                    </select>
                                </div>
                                <div class="item width--2 custom-select">
                                    <label>İşlem Tipi</label>
                                    <select>
                                        <option>Satılık</option>
                                        <option>Kiralık</option>
                                    </select>
                                </div>
                                <div class="item width--1 currency">
                                    <label>Min Fiyat</label>
                                    <input type="number" placeholder="0">
                                    <small class="currency-value">₺</small>
                                </div>
                                <div class="item width--1 currency">
                                    <label>Max Fiyat</label>
                                    <input type="number" placeholder="100">
                                    <small class="currency-value">₺</small>
                                </div>
                                <div class="item width--1 custom-select">
                                    <label>Birim</label>
                                    <select class="currency-change">
                                        <option data-currency="₺">TL</option>
                                        <option data-currency="$">Dolar</option>
                                        <option data-currency="€">Euro</option>
                                    </select>
                                </div>
                                <div class="item width--1 custom-select">
                                    <label>İl</label>
                                    <select>
                                        <option>İstanbul</option>
                                        <option>Amasaya</option>
                                        <option>Ankara</option>
                                    </select>
                                </div>
                                <div class="item width--1 custom-select">
                                    <label>İlçe</label>
                                    <select>
                                        <option>Pendik</option>
                                        <option>Kartal</option>
                                        <option>Üsküdar</option>
                                    </select>
                                </div>
                                <div class="item width--1 custom-select">
                                    <label>Mahalle</label>
                                    <select>
                                        <option>Orhangazi</option>
                                        <option>Türkmen</option>
                                        <option>Doğanay</option>
                                    </select>
                                </div>
                                <div class="item width--3">
                                    <button class="button button color--maximum-red-bg size--stretch size--medium">
                                        <span>Haritada Göster</span>
                                    </button>
                                </div>
                                <div class="item width--3">
                                    <button class="button button color--endeavour-bg size--stretch size--medium">
                                        <span>Portföy Ara</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="detail-bar">
                        <div class="text">Toplam <strong>120 ilan</strong> bulunmaktadır.</div>
                        <div class="list-filter">
                            <form action="">
                                <div class="list">
                                    <select>
                                        <option selected disabled>Sıralama</option>
                                        <option>A-Z</option>
                                        <option>Z-A</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="background"><img src="assets/images/other/image-5.jpg" alt=""></div>
                    <div class="content">
                        <img src="assets/images/brand/logo-text-white.png" alt="">
                        <a href="" class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.73 45.73">
                                <path
                                    d="M10.72,18.12h-3.53C7.83,9.46,15.37,2.96,24.03,3.61c6.14,.46,11.45,4.45,13.58,10.22,.36,.92,1.4,1.37,2.32,1,.89-.35,1.34-1.34,1.03-2.24C37.26,2.6,26.15-2.5,16.16,1.21,8.67,3.99,3.67,11.1,3.58,19.08,1.36,20.36,0,22.72,0,25.27v6.07c0,3.95,3.2,7.14,7.15,7.15h3.57c.99,0,1.79-.8,1.79-1.79V19.91c0-.99-.8-1.79-1.79-1.79h0Zm-1.79,16.79h-1.79c-1.97,0-3.57-1.6-3.57-3.57v-6.07c0-1.97,1.6-3.57,3.57-3.57h1.79v13.22Zm29.66-16.79h-3.57c-.99,0-1.79,.8-1.79,1.79v18.67c0,.99-.8,1.78-1.79,1.79h-5.45v.06c-.96-1.73-3.13-2.35-4.86-1.4-1.73,.96-2.35,3.13-1.4,4.86,.96,1.73,3.13,2.35,4.86,1.4,.59-.33,1.07-.81,1.4-1.4v.06h5.45c2.96,0,5.36-2.4,5.36-5.36v-.09h1.79c3.94,0,7.14-3.2,7.15-7.15v-6.07c0-3.95-3.2-7.14-7.15-7.15Zm3.57,13.22c0,1.97-1.6,3.57-3.57,3.57h-1.79v-13.22h1.79c1.97,0,3.57,1.6,3.57,3.57v6.07Z" />
                            </svg>
                            <div class="text">
                                <div class="small">Bizimle İletişime Geçin</div>
                                <div class="value">+90 (324) 325-3030</div>
                            </div>
                        </a>
                        <a href="" class="item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.98 42.15">
                                <path
                                    d="M20.49,5.47c-5.28,0-9.56,4.28-9.56,9.56,0,3.26,1.66,6.3,4.42,8.06,2.86,1.81,6.46,2.01,9.51,.52,.69-.32,.99-1.13,.67-1.81-.32-.69-1.13-.99-1.81-.67h0c-2.2,1.09-4.81,.96-6.89-.34-3.18-2.03-4.11-6.25-2.09-9.43,2.03-3.18,6.25-4.11,9.43-2.09,1.97,1.25,3.16,3.43,3.16,5.76,0,.75-.6,1.37-1.36,1.38-.75,0-1.37-.6-1.38-1.36h0v-.02c0-2.26-1.83-4.1-4.1-4.1-2.26,0-4.1,1.83-4.1,4.1s1.83,4.1,4.1,4.1c1.01,0,1.99-.37,2.74-1.04,1.69,1.51,4.28,1.36,5.79-.33,.67-.75,1.04-1.72,1.04-2.72,0-5.28-4.28-9.55-9.56-9.56Zm1.35,9.78c-.12,.74-.83,1.24-1.57,1.12-.74-.12-1.24-.83-1.12-1.57,.12-.74,.83-1.24,1.57-1.12,.6,.1,1.06,.59,1.13,1.19-.02,.12-.02,.25-.01,.38h0Zm19.14,.97c0-.33-.15-.65-.4-.87l-5.06-4.58V1.24c-.04-.72-.65-1.27-1.37-1.24H6.83c-.72-.03-1.33,.52-1.37,1.24V10.77L.4,15.34h-.01c-.24,.23-.38,.54-.39,.87v22.23c.12,2.15,1.95,3.8,4.1,3.7H36.88c2.15,.1,3.98-1.55,4.1-3.7V16.22h0Zm-5.46-1.96l2.17,1.96-2.17,1.96v-3.92Zm-27.31-2.98h0V2.47h24.58V11.28h0v9.37l-7.4,6.68H15.58l-7.4-6.68,.02-9.36Zm-2.73,2.98v3.92l-2.17-1.96,2.17-1.96Zm-2.74,23.67V19.2l10.36,9.37L2.73,37.93Zm1.93,1.75l10.93-9.88h9.8l10.93,9.88H4.66Zm33.58-1.75l-10.36-9.37,10.36-9.36v18.73Z" />
                            </svg>
                            <div class="text">
                                <div class="small">Bize Mail Gönder</div>
                                <div class="value">info@remax-loca-mrs.com</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio-grid col-3">
                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">700.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">650.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-3.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-1.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">500.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">700.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">700.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">650.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-3.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-1.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">500.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">700.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>

                <a href="" class="portfolio-item">
                    <div class="thumbnail">
                        <div class="images">
                            <img class="active" src="assets/images/portfolio/image-1.jpg" alt="">
                            <img src="assets/images/portfolio/image-2.jpg" alt="">
                            <img src="assets/images/portfolio/image-3.jpg" alt="">
                        </div>
                        <div class="fields">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dots">
                            <span class="active"></span><span></span><span></span>
                        </div>
                        <div class="more">Detaylı İncele</div>
                    </div>
                    <div class="heading">
                        <div class="name">REMAX LOCA GMK VE DENİZE YAKIN</div>
                        <div class="sale">
                            <div class="type">Satılık - Konut</div>
                            <div class="price">700.000₺</div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="info">
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M24.75,7.48s0,0,0-.01V.59c0-.32-.26-.59-.59-.59H.59C.26,0,0,.26,0,.59V24.16c0,.32,.26,.59,.59,.59H24.16c.32,0,.59-.26,.59-.59V7.49s0,0,0-.01ZM12.35,23.58s.03-.09,.02-.14v-6.4c.01-.34-.25-.62-.59-.63-.34,.01-.6,.3-.59,.63v6.4c0,.05,.01,.1,.02,.14H1.17V12.15H11.2v.88c0,.32,.26,.59,.59,.59,.32,0,.59-.26,.59-.59v-1.47c0-.32-.26-.59-.59-.59H1.17V1.17H12.86v.84s0,.06,0,.08c.02,.32,.3,.57,.63,.54,.32-.02,.57-.3,.54-.63v-.84h9.54V6.89H14.03v-.88h0c0-.32-.26-.59-.59-.59s-.59,.26-.59,.59v1.47c0,.32,.26,.59,.59,.59h10.12v15.51H12.35Z" />
                                </svg>
                                <span>3+1</span>
                            </div>
                            <div class="item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.75 24.75">
                                    <path
                                        d="M20.18,6.61c-.32,0-.59-.26-.59-.59v-.88h-.88c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59v1.46c0,.32-.26,.59-.58,.59h0Zm-4-1.47h-2.54c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-5.08,0h-2.53c-.32,0-.59-.26-.59-.59s.26-.59,.59-.59h2.54c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h0Zm-6.54,1.47c-.32,0-.59-.26-.59-.59h0v-1.47c0-.32,.26-.59,.59-.59h1.46c.32,0,.59,.26,.59,.59s-.26,.59-.59,.59h-.88v.88c0,.32-.26,.59-.58,.59h0Zm0,10.15c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v2.54c0,.32-.26,.58-.59,.58Zm1.46,9.08h-1.46c-.32,0-.59-.26-.59-.59v-1.47c0-.32,.26-.59,.59-.59s.59,.26,.59,.59v.88h.88c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm10.16,0h-2.54c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58Zm-5.08,0h-2.53c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h2.54c.32,0,.59,.26,.58,.59,0,.32-.26,.58-.58,.58h0Zm9.08,0h-1.47c-.32,0-.59-.26-.58-.59,0-.32,.26-.58,.58-.58h.88v-.88c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v1.47c0,.32-.26,.58-.58,.59Zm0-4c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.59-.59,.59Zm0-5.08c-.32,0-.59-.26-.59-.59v-2.54c0-.32,.26-.59,.59-.58,.32,0,.58,.26,.58,.58v2.54c0,.32-.26,.58-.59,.58Zm3.98,13.06H.59c-.32,0-.59-.26-.59-.59H0V.59C0,.26,.26,0,.59,0H24.16c.32,0,.59,.26,.59,.59V24.16c0,.32-.26,.59-.59,.59ZM1.17,23.57H23.57V1.17H1.17V23.57Z" />
                                </svg>
                                <span>120 m²</span>
                            </div>
                        </div>
                        <div class="location">Mezitli / Seymenler</div>
                    </div>
                </a>
            </div>
            <div class="more-button mt--60">
                <button
                    class="button button color--endeavour-bg size--fit size--wide size--small icon--right icon--small">
                    <span>Devamını Gör</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8.66 5.08">
                        <path
                            d="M4.33,5.08c-.19,0-.38-.07-.53-.22L.22,1.28C-.07,.99-.07,.51,.22,.22S.99-.07,1.28,.22l3.05,3.05L7.38,.22c.29-.29,.77-.29,1.06,0s.29,.77,0,1.06l-3.58,3.58c-.15,.15-.34,.22-.53,.22Z" />
                    </svg>
                </button>
            </div>
        </div>
    </article>
</main>

@include('themes.main.footer')
