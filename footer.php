<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pins-theme
 */
 global $redux_demo;
?>

	</div><!-- #content -->
    <div class="line-3"></div>
    <footer class="container ">
        <div class="footer-container">
            <div class="footer-block">
                <a href="<?php echo home_url(); ?>">
                    <img class="footer-logo" src="<?php echo $redux_demo['logo'] ['url']; ?>" alt="Логотип pins" >
                </a>
                <div class="footer-local">
                    <div class="marker"></div>
                    <p>Pins в Запорожье: </br><?php echo $redux_demo['address-1']; ?></p>
                </div>
                <div class="footer-local">
                    <div class="marker-2"></div>
                    <p>Pins в Днепре: </br><?php echo $redux_demo['address-2']; ?></p>
                </div>
                <div class="footer-local">
                    <div class="marker-3"></div>
                    <p>Pins в Кривом Роге: </br><?php echo $redux_demo['address-3']; ?></p>
                </div>
                <div class="footer-phone"><div class="phone-i"></div><a href="tel:<?php echo $redux_demo['phone']; ?>"><?php echo $redux_demo['phone']; ?></a></div>
                <div class="footer-email"><div class="email-i"></div><a href="mailto:<?php echo $redux_demo['email']; ?>"><?php echo $redux_demo['email']; ?></a></div>
                <div class="footer-social">
                    <ul class="main-menu">
                        <li class="item-topbar-mobile-footer p-l-10">
                            <div class="topbar-social-mobile">
                                <a href="<?php echo $redux_demo['social']['Facebook']; ?>" class="topbar-social-item cl-w fab fa-facebook-f" target="_blank"></a>
                                <a href="<?php echo $redux_demo['social']['Instagram']; ?>" class="topbar-social-item cl-w fab fa-instagram" target="_blank"></a>
                                <a href="<?php echo $redux_demo['social']['Youtube']; ?>" class="topbar-social-item cl-w fab fa-youtube" target="_blank"></a>
                            </div>
                        </li>
                    </ul>
    
                </div>
            </div>

            <div class="line-4"></div>
                    
            <div class="footer-block">
                <div class="online-title">
                    <p>Online</p>
                </div>
                <div class="online-box">
                    <div class="online-subtitle">
                        <p>Курсы</p>
                    </div>
                    <div class="online-course">
                        <ul>
                            <li class="online-block"> <a href="/course/course-pins-start/"> PINS Start </a></li>
                            <li class="online-block"> <a href="/course/course-pins-lace/"> PINS Lace </a></li>
                            <li class="online-block"><a href="/course/course-pins-coat/"> PINS Coat </a></li>
                        </ul>
                    </div>
                </div>

                <div class="master">
                    <div class="master-title">
                        <p>Мастер-классы</p>
                    </div>
                    <div class="master-list">
                        <ul>
                            <li class="master-block"><a href="#">Комплект белья «Бра» </a></li>
                            <li class="master-block"><a href="#"> Базовая футболка</a></li>
                            <li class="master-block"><a href="#"> Юбка «Татьянка»</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="line-4"></div>

            <div class="footer-block">
                <div class="online-title">
                    <p>Offline</p>
                </div>
                <div class="online-box">
                    <div class="online-subtitle">
                        <p>Курсы</p>
                    </div>
                    <div class="online-course">
                        <ul>
                            <li class="online-block"> <a href="/course/course-pins-start/"> PINS Start </a></li>
                            <li class="online-block"> <a href="/course/course-pins-lace/"> PINS Lace </a></li>
                            <li class="online-block"><a href="/course/course-pins-coat/"> PINS Coat </a></li>
                            <li class="online-block"><a href="#"> PINS Lady </a></li>
                            <li class="online-block"><a href="#"> PINS Jersey </a></li>
                            <li class="online-block"><a href="#"> PINS Chick </a></li>
                            <li class="online-block"><a href="/course/course-pins-junior/"> PINS Junior </a></li>
                            <li class="online-block"><a href="#"> Fashion Illustration </a></li>

                        </ul>
                    </div>
                </div>
                <div class="master">
                    <div class="master-title">
                        <p>Мастер-классы</p>
                    </div>
                    <div class="master-list">
                        <ul>
                            <li class="master-block"><a href="#">Комплект белья «Бра»</a></li>
                            <li class="master-block"><a href="#">Базовая футболка</a></li>
                            <li class="master-block"><a href="#">Сумочка «Бананка»</a></li>
                            <li class="master-block"><a href="#">Fashion Illustration</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="line-4"></div>

            <div class="footer-block">
                <div class="online-box">
                    <div class="online-title">
                        <p>О нас</p>
                    </div>
                    <div class="onas">
                        <ul>
                            <li class="onas-block-1"><a href="#">Политика
                                    конфиденциальности</a></li>
                            <li class="onas-block-2"><a href="#">Условия оказания услуг</a></li>
                            <li class="onas-block-3"><a href="#">Авторское право
                                    и предупреждение</a></li>
                            <li class="onas-block-4"><a href="#"> Как купить курс ONLINE?</a></li>
                            <li class="onas-block-5"><a href="#"> Как начать обучение?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy">
            <p><?php echo $redux_demo['copypast']; ?></p>
        </div>
    </footer>
<script>
                  /*[ Show menu mobile ]
    ===========================================================*/
    (function ($) {
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.wrap-side-menu').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu').slideToggle();
            $(this).toggleClass('turn-arrow');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.wrap-side-menu').css('display') == 'block'){
                $('.wrap-side-menu').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }
            if($('.sub-menu').css('display') == 'block'){
                $('.sub-menu').css('display','none');
                $('.arrow-main-menu').removeClass('turn-arrow');
            }
        }
    });
})(jQuery);
</script>

<div class="overlay-review" style="display: none;">
    <div class="modal-review">
        <div class="modal-review__wrapper">
            <span class="modal-review__name">Ксения Комарова</span>
            <span class="modal-review__data">April 30, 2018</span>
            <p class="modal-review__text">Прошла курсы для начинающих PINS Start, хоть и сомневалась нужно ли это мне!Но, мои сомнения были очень даже напрасными студия оказалась шикарная- стильная и современная, преподаватели замечательные - настоящие профессионалы, атмосфера потрясающая- очень  уютная и вдохновляющая!)
                Очень понравилось еще, что получила много практических навыков, благодаря правильно выстроенной учебной программе, плюс полезные и интересные знакомства!)Ну а за готовые изделия собственного пошива я вообще молчу! Это такой кайф создавать что то своё, при этом наполняя свое творение правильной энергетикой!)Вообщем, по итогам курса - я в диком восторге!)) Хочу еще записаться на курсы по нижнему белью, чтобы радовать своими изделиями уже не только себя</p>
            <button class="modal-review__close">
                <svg height="329pt" fill="#2c2525" viewBox="0 0 329.26933 329" width="329pt">
                    <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<?php
    $course = new WP_Query([
        'post_type' => 'course'
    ]);
?>

<script>

    const course = <?php echo json_encode($course) ?>;
</script>
<!--<script src="https://pins.itdecision.com.ua/wp-content/themes/pins-theme/js/vue.js"></script>-->
<!--<script src="https://pins.itdecision.com.ua/wp-content/themes/pins-theme/js/main.js" type="text/javascript"></script>-->
</body>
</html>
