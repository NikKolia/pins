<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pins-theme
 */

get_header();
?>


<?php
while (have_posts()) :
    the_post(); ?>

    <section class="single-page-container course-page">
        <div class="single-page-box">
            <div class="single-page-block">

                <!--<div class="needle-9"></div>-->
                <div class="single-page-img"><?php the_post_thumbnail('middle'); ?></div>

            </div>
            <div class="single-page-content">
                <div class="single-page-title"><h1><?php the_title(); ?></h1></div>
                <div class="single-page-double">
                    <div class="single-page-price"><p><?php the_field('price'); ?></p></div>
                    <div class="single-page-time"><p><?php the_field('time'); ?></p></div>
                </div>


                <div class="single-page-button-container">
                    <a href="#" class="popmake-154 reviews-button">Оставить заявку</a>
                </div>

                <div class="line-8"></div>

                <div class="single-page-text"><p><?php the_content(); ?></p></div>
            </div>
        </div>

    </section>


<?php
endwhile; // End of the loop.
?>


<?php

get_footer();
