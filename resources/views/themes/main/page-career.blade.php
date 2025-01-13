@include('themes.main.header')

<main id="page-team" class="header-space">
    <section class="breadcrumb">
        <div class="background"><img src="assets/images/breadcrumb/image-4.jpg" alt=""></div>
        <div class="content">
            <div class="container">
                <h1>Ekibimiz</h1>
            </div>
        </div>
    </section>

    <article class="inner">
        <div class="container">
            <div class="career-field">
                <div class="form-field">
                    <div class="section-heading">
                        <div class="title small">Ekibimize Katılın</div>
                    </div>
                    <form action="">
                        <div class="form">
                            <div class="item width--half">
                                <label>İsim Soyisim</label>
                                <input type="text" placeholder="Ahmet Balcı">
                            </div>
                            <div class="item width--half">
                                <label>E-Posta</label>
                                <input type="email" placeholder="mail@alanadi.com">
                            </div>
                            <div class="item width--half">
                                <label>Telefon</label>
                                <input type="tel" placeholder="+90 (552) 334 20 50">
                            </div>
                            <div class="item width--half custom-select">
                                <label>Cinsiyet</label>
                                <select>
                                    <option>Erkek</option>
                                    <option>Kadın</option>
                                </select>
                            </div>
                            <div class="item width--half custom-date">
                                <label>Doğum Tarihimiz</label>
                                <input type="date">
                            </div>
                            <div class="item width--half custom-select">
                                <label>Çalışmak İstediğiniz Pozisyon</label>
                                <select>
                                    <option>İnsan Kaynakları</option>
                                    <option>Muhasebe</option>
                                </select>
                            </div>
                            <div class="item width--half custom-select">
                                <label>Çalışmak İstediğiniz Ofis</label>
                                <select>
                                    <option>Remax Loca</option>
                                    <option>Adana Şube</option>
                                </select>
                            </div>
                            <div class="item width--half custom-select">
                                <label>Aracınız Varmı</label>
                                <select>
                                    <option>Var</option>
                                    <option>Yok</option>
                                </select>
                            </div>
                            <div class="item width--full">
                                <label>Mesajınız</label>
                                <textarea placeholder="Mesajınızı buraya yazınız..."></textarea>
                            </div>
                            <div class="item width--half custom-checkbox">
                                <div class="checkbox">
                                    <input type="checkbox">
                                    <div class="box"></div>
                                </div>
                                <div class="text">Formu gönderdiğiniz de <a href="" target="_blank">KVKK</a> ve
                                    <a href="" target="_blank">Gizlilik Şartlarını</a> kabul etmiş olursunuz
                                </div>
                            </div>
                            <div class="item width--half buttons">
                                <div class="custom-file-box">
                                    <div class="custom-file">
                                        <input type="file" accept=".docx, .pdf">
                                        <div class="button color--endeavour-br icon--small icon--right size--stretch">
                                            <span>CV Yükle</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.65 15.65">
                                                <path
                                                    d="M13.33,15.65H2.32c-1.28,0-2.32-1.04-2.32-2.32v-3.15c0-.41,.34-.75,.75-.75s.75,.34,.75,.75v3.15c0,.45,.37,.82,.82,.82H13.33c.45,0,.82-.37,.82-.82v-3.15c0-.41,.34-.75,.75-.75s.75,.34,.75,.75v3.15c0,1.28-1.04,2.32-2.32,2.32Zm-1.04-11.5L8.36,.22s-.02,0-.02-.02c-.13-.12-.31-.2-.51-.2-.21,0-.4,.09-.53,.22l-3.93,3.93c-.29,.29-.29,.77,0,1.06s.77,.29,1.06,0l2.65-2.65v7.62c0,.41,.34,.75,.75,.75s.75-.34,.75-.75V2.56l2.65,2.65c.15,.15,.34,.22,.53,.22s.38-.07,.53-.22c.29-.29,.29-.77,0-1.06Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="file-name"></div>
                                </div>
                                <button class="button button color--maximum-red-bg size--stretch size--medium">
                                    <span>Gönder</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="image type">
                    <div class="sticky">
                        <img src="assets/images/other/image-1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

@include('themes.main.footer')

<script>
    $(document).on("change", '.custom-file input', function() {
        $('.file-name').html($(this)[0].files[0].name);
    });
</script>
