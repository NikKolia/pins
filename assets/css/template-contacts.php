<?php
/*
 * Template Name: Контакты
 * 
 * */
get_header();
?>
    <section class="contacts">
        <div class="container contacts-box">
           <div class="row">
              <div class="col-md-6 contacts-block marg">
                  <h1 class="contacts-h1">Pins<br>
                      Контакты</h1>
              </div>
              <div class="col-md-6 contacts-block contactsRight">
                  <div class="contacts-title dicor">

                      <div class="needle"><h3>Cвязь</h3>
                      </div>
                      <div class="line-1">
                      </div>
                  </div>
                  <div class="contacts-cont">
                      <a href=""></a>
                      <div class="contacts-phone"><a
                                  href="tel:<?php echo $redux_demo['phone']; ?>"><?php echo $redux_demo['phone']; ?></a>
                      </div>
                      <div class="contacts-email"><a
                                  href="mailto:<?php echo $redux_demo['email']; ?>"><?php echo $redux_demo['email']; ?></a>
                      </div>
                  </div>
                  <div class="contacts-title dicor">

                      <div class="needle"><h3>Адреса</h3>
                      </div>
                      <div class="line-1">
                      </div>
                  </div>
                  <div class="contacts-adress">
                      <div class="contacts-adress-block">
                          <p><?php echo $redux_demo['address-1']; ?></p>
                      </div>
                      <div class="contacts-adress-block">
                          <p><?php echo $redux_demo['address-2']; ?></p>
                      </div>
                      <div class="contacts-adress-block">
                          <p><?php echo $redux_demo['address-3']; ?></p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid contacts-b2">
        <div class="row contacts-three justify-content-center">
            <div class="col-xl-9 col-lg-8 contacts-maps">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'zp')">Запорожье</button>
                    <button class="tablinks" id="dnepr" onclick="openCity(event, 'dp')">Днепр</button>
                    <button class="tablinks" onclick="openCity(event, 'kr')">Кривой Рог</button>
                </div>
                <div class="booking-subtitle" id="tab-marg"><p>Чтобы узнать точное расположение нашей школы на карте,
                        выберите ваш город</p></div>
                <div id="zp" class="tabcontent" style="display:block">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d669.770114465113!2d35.164564695920966!3d47.81865832553416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc5f2e0bf85adf%3A0xf44fd798f66d40ac!2z0KjQutC-0LvQsCDRiNC40YLRjNGPICJQSU5TIiwg0LrRg9GA0YHRiyDRiNC40YLRjNGPLCDQutGD0YDRgdGLINC60YDQvtC50LrQuCDQuCDRiNC40YLRjNGPINCX0LDQv9C-0YDQvtC20YzQtQ!5e0!3m2!1sru!2sua!4v1577082356074!5m2!1sru!2sua"
                            width="100%" height="735" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

                <div id="dp" class="tabcontent">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1573.0171958481794!2d35.04031455557872!3d48.466332496494395!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa250fbcf1dbb790!2z0KjQutC-0LvQsCDRiNC40YLRjNGPICJQSU5TIjog0LrRg9GA0YHRiyDRiNC40YLRjNGPLCDQutGD0YDRgdGLINC60YDQvtC50LrQuCDQuCDRiNC40YLRjNGPINCU0L3QtdC_0YA!5e0!3m2!1sru!2sua!4v1580861736692!5m2!1sru!2sua"
                            width="100%" height="735" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

                <div id="kr" class="tabcontent">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d334.32619448122864!2d33.3755380609292!3d47.905241940765286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40db20af229efb4d%3A0x466d8ad5064c4780!2z0L_RgNC-0YHQvy4g0JPQtdGA0L7QtdCyLdC_0L7QtNC_0L7Qu9GM0YnQuNC60L7QsiwgMdCRLCDQmtGA0LjQstC-0Lkg0KDQvtCzLCDQlNC90LXQv9GA0L7Qv9C10YLRgNC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNTAwMDA!5e0!3m2!1sru!2sua!4v1580932360409!5m2!1sru!2sua"
                            width="100%" height="735" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 contacts-form contFormConacts center">
                <div class="contacts-form-double">
                    <div class="contacts-form-title">Есть вопрос?</div>
                    <div class="contacts-form-desc-cont center"><p>Вы можете отправить свой вопрос
                            об интересующем курсе, мы с радостью
                            ответим на него в удобной для вас форме</p></div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="130" title="contacts" html_class="form-disp"] '); ?>
            </div>
        </div>
    </section>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>

<?php
get_footer();
