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
                        <img class="footer-logo" src="<?php echo $redux_demo['logo'] ['url']; ?>" alt="Логотип pins" ></a>
                        <div class="footer-local">
                            <div class="marker"></div> <p>Pins в Запорожье:
                            <?php echo $redux_demo['address-1']; ?></p> </div>
                        <div class="footer-local">
                            <div class="marker-2"></div> <p>Pins в Днепре: 
                            <?php echo $redux_demo['address-2']; ?></p> </div>
                            <div class="footer-local">
                            <div class="marker-2"></div> <p>Pins в Кривом-рогу: 
                            <?php echo $redux_demo['address-3']; ?></p> </div>
                            <div class="footer-phone"><div class="phone-i"></div><a href="tel:<?php echo $redux_demo['phone']; ?>"><?php echo $redux_demo['phone']; ?></a></div>
                    <div class="footer-email"><div class="email-i"></div><a href="mailto:<?php echo $redux_demo['email']; ?>"><?php echo $redux_demo['email']; ?></a></div>
                    <div class="footer-social">
                        <ul class="main-menu">
                        <li class="item-topbar-mobile-footer p-l-10">
                            <div class="topbar-social-mobile">
                                <a href="<?php echo $redux_demo['social']['Facebook']; ?>" class="topbar-social-item fab fa-facebook-f"></a>
                                <a href="<?php echo $redux_demo['social']['Instagram']; ?>" class="topbar-social-item fab fa-instagram"></a>
                                <a href="<?php echo $redux_demo['social']['Youtube']; ?>" class="topbar-social-item fab fa-youtube"></a>
                            </div>
                        </li>
                    </ul>
    
                    </div>
                    </div>
                    <div class="line-4"></div>
                    
                    <div class="footer-block">
                        <div class="online-box">
                            <div class="online-title">
                                <p>Online</p>
                            </div>
                            <div class="online-subtitle">
                                <p>Курсы</p>
                            </div>
                            <div class="online-course">
                            <ul>
                                <li class="online-block"> <a href="#"> PINS Start </a></li>
                                <li class="online-block"> <a href="#"> PINS Lace </a></li>
                                <li class="online-block"><a href="#"> PINS Coat </a></li>
                               
                            </ul>
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
                    </div>
                    <div class="line-4"></div>
                    <div class="footer-block">
                        <div class="online-box">
                            <div class="online-title">
                                <p>Offline</p>
                            </div>
                            <div class="online-subtitle">
                                <p>Курсы</p>
                            </div>
                            <div class="online-course">
                            <ul>
                                <li class="online-block"> <a href="#"> PINS Start </a></li>
                                <li class="online-block"> <a href="#"> PINS Lace </a></li>
                                <li class="online-block"><a href="#"> PINS Coat </a></li>
                                <li class="online-block"><a href="#"> PINS Lady </a></li>
                                <li class="online-block"><a href="#"> PINS Jersey </a></li>
                                <li class="online-block"><a href="#"> PINS Chick </a></li>
                                <li class="online-block"><a href="#"> PINS Junior </a></li>
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
                                <li class="master-block"><a href="#">Сумочка «Бананка» для девочек</a></li>
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
<?php wp_footer(); ?>

</body>
</html>
