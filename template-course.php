<?php
/*
 * Template Name: Курсы1
 * 
 * */
get_header();
?>
    <section class="container course-main">
        <img src="<?php the_field('course_hero'); ?>" alt="">
    </section>
    <section class="course-container course-container--desktop courseContainerBg1">
            <?php $args = array(
                'post_type' => 'course',
                /* 'posts_per_page' => 10, */

            );
            $course = new WP_Query($args); ?>

            <?php
            $i = 0;
            while ($course->have_posts()) :
                $course->the_post();

                if ($i == 0) {
                    echo '<div class="container courseWrapper">';
                } ?>

                <div class="course-block">
                    <div class="needle-2"></div>
                    <a class="course-content" href="<?php the_permalink(); ?>">

                        <div class="course-title">
                            <h4><?php the_title(); ?></h4>
                            <!-- <div class="course-arrow">
                                       <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/mini-arrow-right.png"
                                            alt="">
                                   </div> -->
                            <div class="course-tumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'course'); ?>
                            </div>
                        </div>

                        <div class="line-3"></div>
                        <div class="course-double">
                            <div class="course-price"><p><?php the_field('price'); ?></p></div>
                            <div class="course-time"><p><?php the_field('time'); ?></p></div>
                        </div>
                        <div class="course-text"><?php the_excerpt(); ?></div>
                    </a>
                </div>

                <?php
                $i++;
                if ($i == 2) {
                    $i = 0;
                    echo '</div>';
                }

            endwhile; // End of the loop.

            if ($i > 0) {
                echo '</div>';
            }
            ?>
    </section>
    <section class="course-container course-container--mobile courseContainerBg1">
        <div class="container">
            <?php $args = array(
                'post_type' => 'course',
                /* 'posts_per_page' => 10, */

            );
            $course = new WP_Query($args); ?>

            <?php
            while ($course->have_posts()) :
                $course->the_post();
                ?>

                <div class="course-block">
                    <div class="needle-2"></div>
                    <a class="course-content" href="<?php the_permalink(); ?>">

                        <div class="course-title">
                            <h4><?php the_title(); ?></h4>
                            <!-- <div class="course-arrow">
                                   <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/mini-arrow-right.png"
                                        alt="">
                               </div> -->
                            <div class="course-tumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'course'); ?>
                            </div>
                        </div>

                        <div class="line-3"></div>
                        <div class="course-double">
                            <div class="course-price"><p><?php the_field('price'); ?></p></div>
                            <div class="course-time"><p><?php the_field('time'); ?></p></div>
                        </div>
                        <div class="course-text"><?php the_excerpt(); ?></div>
                    </a>
                </div>

            <?php
            endwhile; // End of the loop.
            ?>

        </div>
    </section>
    <section class="container booking-container">
        <div class="booking-foure">
            <div class="booking-title dicor">

                <div class="needle"><h1>Расписание</h1>
                </div>
                <div class="line-1">
                </div>

            </div>
            <!--  <div class="booking-subtitle"><p>для обучения офлайн(в разработке)</p></div> -->
        </div>
    </section>
    <!--  <section class="container">
        <?php if( function_exists("wd_form_maker") ) { wd_form_maker(6, "embedded"); } ?>
    </section>  -->
    <!--  <section class="container booking-slider-container">
    <div class="booking-slider-content">
        <div class="booking-double">
<div class="arrow-left">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/arrow-slider-left.png" alt="">
</div>
<div class="booking-change"><p>Выберите город</p></div>
<div class="arrow-right">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/arrow-slider-right.png" alt="">
</div>
</div>
    <div class=" booking-slider">
    <div class="booking-item">
        <div class="booking-three">
      <p class="booking-city">Запорожье</p>
    <div class="booking-box">
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="booking-item">
    <div class="booking-three">
  <p class="booking-city">Днепр</p>
<div class="booking-box">
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
			
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
</div>
</div>
</div>
<div class="booking-item">
    <div class="booking-three">
  <p class="booking-city">Кривой Рог</p>
<div class="booking-box">
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
</div>
</div>
</div>    
  </div>
</div>
</section> -->

    <section class="service-form-container">
        <div class="service-form-2">
            <div class="form-titles"><h4>Есть вопрос?</h4></div>
            <div class="form-desc-2"><p>Вы можете отправить свой вопрос
                    об интересующем курсе, мы с радостью
                    ответим на него в удобной для вас форме</p></div>
            <?php echo do_shortcode('[contact-form-7 id="131" title="course" html_class="form-disp-2"] '); ?>

        </div>
    </section>

<!--
        <script>
            var modal = document.querySelector(".modal");
            var trigger = document.querySelector(".trigger");
            var closeButton = document.querySelector(".close-button");

            function toggleModal() {
                modal.classList.toggle("show-modal");
            }

            function windowOnClick(event) {
                if (event.target === modal) {
                    toggleModal();
                }
            }

            trigger.addEventListener("click", toggleModal);
            closeButton.addEventListener("click", toggleModal);
            window.addEventListener("click", windowOnClick);
        </script>

        <script>
            $(document).ready(function () {
                $('.booking-slider').slick({
                    infinite: true,
                    prevArrow: $('.arrow-right'),
                    nextArrow: $('.arrow-left')
                });
            });
        </script>
<?php
get_footer();
