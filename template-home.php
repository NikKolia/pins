<?php /*
Template name: Главная Страница
 */
get_header();
?>

    <div class="hero-image">
        <div class="hero-text">
            <h1>Pins<br>Start</h1>
            <p>Курс для новичков</p>
            <div class="more-button-container">
                <a href="/course/курс-pins-start/" class="more-button">Подробнее</a>
            </div>
            <!-- <div class="slider-desc">
                <p>Курс для новичков</p>
               </div>
               <div class="slider-button">Подробнее</div> -->
        </div>
    </div>
    <!-- <section class="slider-container">
        <div class="slider">
            <div class="slider-content">
                <h1>Pins<br>
                   Start</h1>
            </div>
            <div class="slider-desc">
            <p>Курс для новичков</p>
           </div>
           <div class="slider-button">Подробнее</div>
        </div>

    </section> -->
    <section class="container info-container">
        <div class="info-school">
            <div class="info-school-img">

                <img src="<?php the_field('skirt_info') ?>" alt="Макет платья">
            </div>
            <div class="info-school-content">
                <div class="info-school-title dicor">

                    <div class="needle"><h1><?php the_field('info_school_title') ?></h1>
                    </div>
                    <div class="line-1">
                    </div>
                </div>
                <div class="info-school-text"><p><?php the_field('info_school_text') ?></p></div>
            </div>
        </div>
    </section>
    <div class="line-2 size-mar-top-1"></div>
    <section class="container">
        <div class="reviews-center section__block-icons__title">
            <div class="profit-title dicor">
                <div class="needle"><h1><?php the_field('why_title') ?></h1>
                </div>
                <div class="line-1">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 center">
                <div class="block-icons-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/block-icons/sewing_icon_pins.png"
                            alt=""></div>
                <div class="block-icons-content">
                    <div class="block-icons-title"><h2><?php the_field('benefits_title_1') ?></h2></div>
                    <div class="block-icons-text"><p><?php the_field('benefits_text_1') ?></p></div>
                </div>
            </div>
            <div class="col-md-3 center">
                <div class="block-icons-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/block-icons/line_icon_pins.png"
                            alt=""></div>
                <div class="block-icons-content">
                    <div class="block-icons-title"><h2><?php the_field('benefits_title_2') ?></h2></div>
                    <div class="block-icons-text"><p><?php the_field('benefits_text_2') ?></p></div>
                </div>
            </div>
            <div class="col-md-3 center">
                <div class="block-icons-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/block-icons/skirt_icon_pins.png"
                            alt=""></div>
                <div class="block-icons-content">
                    <div class="block-icons-title"><h2><?php the_field('benefits_title_3') ?></h2></div>
                    <div class="block-icons-text"><p><?php the_field('benefits_text_3') ?></p></div>
                </div>
            </div>
            <div class="col-md-3 center">
                <div class="block-icons-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/block-icons/iron_icon_pins.png"
                            alt=""></div>
                <div class="block-icons-content">
                    <div class="block-icons-title"><h2><?php the_field('benefits_title_4') ?></h2></div>
                    <div class="block-icons-text"><p><?php the_field('benefits_text_4') ?></p></div>
                </div>
            </div>
        </div>
    </section>
    <div class="line-2 size-bott-top-1"></div>
    <section class="container profit-container">
        <div class="profit-block-content">
            <div class="profit-title dicor">
                <div class="needle"><h1><?php the_field('profit_block') ?></h1>
                </div>
                <div class="line-1">
            </div>
            </div>
            <div class="row justify-content-center profit-block-text">
                <div class="col-md-12 profit-content-text">
                    <div class="profit-icons">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profit/check-pins.png" alt="">
                    </div>
                    <div class="profit-text">
                        <h3>
                            <?php the_field('profit_title_1') ?>
                        </h3>
                    </div>
                </div>
                <div class="col-md-12 profit-content-text">
                    <div class="profit-icons">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profit/check-pins.png" alt=""
                             height="55" width="55">
                    </div>
                    <div class="profit-text">
                        <h3>
                            <?php the_field('profit_title_2') ?>
                        </h3>
                    </div>
                </div>
                <div class="col-md-12 profit-content-text">
                    <div class="profit-icons">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profit/check-pins.png" alt="">
                    </div>
                    <div class="profit-text">
                        <h3>
                            <?php the_field('profit_title_3') ?>
                        </h3>
                    </div>
                </div>
                <div class="col-md-12 profit-content-text">
                    <div class="profit-icons">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profit/check-pins.png" alt="">
                    </div>
                    <div class="profit-text">
                        <h3>
                            <?php the_field('profit_title_4') ?>
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="line-2"></div>
    <section class="container photo-container">
        <div class="row justify-content-center photo-block">
            <div class="photo-content sizee">
                <div class="photo-title dicor">

                    <div class="needle"><h1><?php the_field('practice_title') ?></h1>
                    </div>
                    <div class="line-1">
                    </div>
                </div>
                <div class="photo-text">
                    <p><?php the_field('practice_text') ?></p>
                </div>
            </div>
            <?php $args = array(
                'post_type' => 'gallery',
                'posts_per_page' => 2,
                // 'cat' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'position',
                        'field' => 'slug',
                        'terms' => 'static',
                    )
                )
            );
            $gallery = new WP_Query($args); ?>

            <?php
            while ($gallery->have_posts()) :
                $gallery->the_post(); ?>
                <div class="photo-content">
                    <?php the_post_thumbnail('middle'); ?>
                </div>
            <?php
            endwhile; // End of the loop.
            ?>

            <!-- <div class="photo-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/people_1_pins.png" alt="">
            </div>
            <div class="photo-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/people_2_pins.png" alt="">
            </div>
            <div class="photo-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/people_3_pins.png" alt="">
            </div>
            <div class="photo-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/people_4_pins.png" alt="">
            </div>
            <div class="photo-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/photo/people_5_pins.JPG" alt="">
            </div> -->
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <?php echo do_shortcode("[tppostpro id='859']"); ?>
            </div>
        </div>  
    </section>
    <section class="course-container courseContainerBg">
        <div class="container">
            <?php $args = array(
                'post_type' => 'course',
                'posts_per_page' => 2,
            );
            $course = new WP_Query($args); ?>

            <?php
            while ($course->have_posts()) :
                $course->the_post(); ?>

                <div class="course-block">
                    <div class="needle-2"></div>
                    <a class="course-content" href="<?php the_permalink(); ?>">
                        <div class="course-title">
                            <h4><?php the_title(); ?></h4>
                            <div class="course-arrow">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/mini-arrow-right.png"
                                     alt="">
                            </div>
                            <!-- <div class="course-preview-img">
                                       <?php the_post_thumbnail(array(100)); ?>
                                   </div> -->
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
        <div class="all-course-container">
            <a href="/courses" class="all-course">все курсы
                <div class="check"></div>
            </a>
        </div>
    </section>

    <section class="reviews-container">
        <div class="container">
            <div class="row justify-content-center reviews-box">
                <div class="col-md-12">
                    <div class="reviews-center">
                        <div class="reviews-title dicor">

                            <div class="needle"><h1>Отзывы</h1>
                            </div>
                            <div class="line-1">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 postCarousel">
                    <?php echo do_shortcode("[post_grid_carousel id='794']"); ?>
                    <br>
                    <?php if (is_active_sidebar('fb')) : ?>
                        <div class="reviews__fb">
                            <?php dynamic_sidebar('fb'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class="reviews-button-container">
                        <a href="#" class="popmake-176 reviews-button">Написать отзыв</a>
                    </div>
                </div>
            </div>

            <div class="reviews-comma"></div>
        </div>
    </section>

    <div class="line-2"></div>
    <!-- <section class="container reviews-container">
        <div class="row justify-content-center reviews-box">
            <div class="col-md-4 center">
                <div class="reviews-center">
                    <div class="reviews-title-fb dicor">

                        <div class="needle"><h1>Мы на "Facebook"</h1>
                        </div>
                        <div class="line-1">
                        </div>
                    </div>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/sewingPins/" data-tabs="timeline, messages, events" data-width="500" data-height="810" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/sewingPins/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sewingPins/">Школа Шиття &quot;Pins&quot;</a></blockquote></div>
            </div> 
        </div>
    </section> -->

    <section class="container news-container">
        <div class="news-main">
            <div class="news-block-photo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/news/Photo_042_pins.jpg" alt="">
            </div>
            <div class="news-block-content">
                <div class="news-block-content-box">
                    <div class="news-head">
                        <div class="news-head-title dicor">

                            <div class="needle"><h1>Новости</h1>
                            </div>
                            <div class="line-1">
                            </div>
                        </div>
                        <div class="news-head-desc">
                            <p>Статьи, расписание и новости нашей школы</p>
                        </div>
                    </div>
                    <div class="news-box-container">
                        <?php $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2
                        );
                        $news = new WP_Query($args); ?>

                        <?php
                        while ($news->have_posts()) :
                            $news->the_post(); ?>

                            <div class="news-box size-mar-top-4">
                                <div class="news-double">
                                    <div class="news-date"><p><?php the_date(); ?></p></div>

                                    <div class="news-title-container"><h3><a href="<?php the_permalink(); ?>"
                                                                             class="news-title"><?php the_title(); ?></a>
                                        </h3></div>
                                    <!--<a href="<?php the_permalink(); ?>" class="arrow-down">
                                        <img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/news/arrow_down.png"
                                                alt="" width="40" height="auto">
                                    </a>-->
                                </div>
                                <div class="news-desc"><p><?php echo get_excerpt(220); ?></p></div>

                            </div>

                        <?php
                        endwhile; // End of the loop.
                        ?>

                    </div>
                </div>
            </div>

        </div>
        <div class="all-news-container">
            <a href="/news" class="all-news">Все новости
                <div class="check"></div>
            </a>
        </div>
    </section>
    <div class="line-2"></div>
    <section class="container form-container">
        <div class="row justify-content-center form-box">
            <div class="col-md-6 center">
                <div class="form-block-photo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/form/dress-form-at-various-angles-isolated-on-white-PJFR4TS.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-block-content">

                    <div class="form-title dicor">

                        <div class="needle-3"><h1>С чего начать?</h1>
                        </div>
                        <div class="needle-4">
                        </div>

                    </div>
                    <div class="form-desc"><p>Вы можете отправить свой вопрос об интересующем курсе, мы с радостью ответим
                            на него в удобной для вас форме</p></div>

                    <?php echo do_shortcode('[contact-form-7 id="75" title="Home" html_class="form-disp"] '); ?>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();