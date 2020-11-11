<?php
/*
 * Template Name: О нас
 * 
 * */
get_header();
?>

    <section class="container">
        <div class="about-head-photo">
            <img src="<?php the_field('about_hero'); ?>" alt="">
        </div>
    </section>
    <section class="about-history container">
        <div class="about-up-block">
            <div class="timeline-double-block displ">
                <div class="timeline-block"><p>2017</p></div>
                <div class="line-10"></div>
            </div>
            <div class="about-block-1">
                <div class="about-block-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/about/skirt_pins.jpg"
                            class="about-imgs" alt=""></div>
                <div class="about-block-content-1 text-about">
                    <p><?php the_field('timeline-1'); ?></p>
                </div>
            </div>
            <div class="timeline-double-block displ">
                <div class="line-10"></div>
                <div class="timeline-block"><p>2018</p></div>
                <div class="line-10"></div>
            </div>
            <div class="about-block-2">
                <div class="about-block-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/red_girl_pins.png
									" class="about-imgs" alt=""></div>

                <div class="about-block-content-2 text-about">
                    <p><?php the_field('timeline-2'); ?></p>
                </div>
            </div>
        </div>
        <div class="timeline-container">

            <div class="timeline-box">
                <div class="timeline-double-block size-mar-top-3">
                    <div class="line-6"></div>
                    <div class="timeline-block"><p>2017</p></div>

                </div>
                <div class="line-5"></div>
                <div class="timeline-double-block size-mar-top-2">
                    <div class="timeline-block"><p>2018</p></div>
                    <div class="line-6"></div>
                </div>
                <div class="line-5"></div>
                <div class="timeline-double-block size-mar-top-3">
                    <div class="line-6"></div>
                    <div class="timeline-block"><p>2019</p></div>
                </div>
                <div class="line-5"></div>
                <div class="timeline-double-block size-mar-top-2">
                    <div class="timeline-block"><p>2020</p></div>
                    <div class="line-6"></div>
                </div>
                <div class="line-5"></div>
            </div>
        </div>
        <div class="about-down-block">
            <div class="timeline-double-block displ">
                <div class="line-10"></div>
                <div class="timeline-block"><p>2019</p></div>
                <div class="line-10"></div>
            </div>
            <div class="about-block-3">
                <div class="about-block-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/about/sewing-pins.png" alt=""
                            class="about-imgs"></div>
                <div class="about-block-content-3 text-about">
                    <p><?php the_field('timeline-3'); ?></p>
                </div>
            </div>
            <div class="timeline-double-block displ">
                <div class="line-10"></div>
                <div class="timeline-block"><p>2020</p></div>
                <div class="line-10"></div>
            </div>
            <div class="about-block-4">
                <div class="about-block-img"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/about/red_blonde_girl_pins.png"
                            class="about-imgs" alt=""></div>
                <div class="about-block-content-4 text-about">
                    <p><?php the_field('timeline-4'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="prescriptions-container">
        <div class="prescriptions container">
            <div class="prescriptions-left-block">
                <img src="<?php the_field('school-img-1'); ?>" alt="">
            </div>
            <div class="prescriptions-right-block">
                <div class="prescriptions-contact">
                    <div class="prescriptions-title dicor">
                        <h3><?php the_field('schools'); ?></h3>
                        <div class="line-7"></div>
                        <div class="needle-5"></div>

                    </div>
                    <div class="all-contact-container">
                        <a href="/contact" class="all-contact">адреса
                            <div class="check"></div>
                        </a>
                    </div>
                </div>
                <div class="prescriptions-photo-teachers">
                    <img src="<?php the_field('school-img-2'); ?>" alt="">
                </div>
                <div class="prescriptions-course">
                    <div class="prescriptions-photo dicor">
                        <h3><?php the_field('schools-course'); ?></h3>
                        <div class="line-7"></div>
                        <div class="needle-5"></div>

                    </div>
                    <div class="all-course-container-2">
                        <a href="/courses" class="all-course">Курсы
                            <div class="check"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container citation-container">
        <div class="citation-box">
            <div class="citation-block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about/qoute_app_about_pins_.png"
                     alt="">
            </div>
            <div class="citation-text"><p><?php the_field('citation'); ?></p></div>
            <div class="citation-down"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/about/quote_down_about_pins.png"
                        alt=""></div>
        </div>
    </section>
    <section class="container teachers-container">
        <div class="teachers-box-title">
            <div class="teachers-block-title">

                <div class="teachers-title dicor">

                    <h3><?php the_field('prepods'); ?></h3>
                    <div class="line-7"></div>
                    <div class="needle-6"></div>

                </div>
            </div>

            <div class="teachers-block-title size-teacher">
                <div class="teachers-title dicor">
                    <div class="teachers-title-double">
                        <h3><?php the_field('about-special'); ?></h3>
                        <p class="teachers-subtitle"><?php the_field('about-special-sub'); ?></p></div>
                    <div class="line-7"></div>
                    <div class="needle-7"></div>

                </div>
            </div>
        </div>
        <div class="teacher-list">
            <?php $args = array(
                'post_type' => 'prepod',
                'post_per_page' => -1,

            );
            $prepod = new WP_Query($args); ?>

            <?php
            while ($prepod->have_posts()) :
                $prepod->the_post(); ?>


                <div class="teacher-box">
                    <div class="teacher-box-img">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="teacher-box-double">
                        <div class="teacher-box-name"><p><?php the_title(); ?></p>
                        </div>
                        <div class="teacher-box-special">
                            <p><?php the_field('special'); ?></p>
                        </div>
                        <div class="teacher-box-description">
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            <?php
            endwhile; // End of the loop.
            ?>
        </div>
    </section>

<?php
get_footer();
