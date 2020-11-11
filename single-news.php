<?php
/**
 * The template for news post
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

    <section class="single-page-container newBlock">
        <div class="single-page-box">
            <div class="single-page-block">

                <!--<div class="needle-9"></div>-->
                <div class="single-page-img"><?php the_post_thumbnail('middle'); ?></div>

            </div>
            <div class="single-page-content">
                <div class="single-page-title"><h1><?php the_title(); ?></h1></div>

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
