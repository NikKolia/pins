<?php
/*
 * Template Name: News Template
 * Template Post Type: post
 * */
get_header();
?>

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
                            'post_per_page' => 4,

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
                                    <a href="<?php the_permalink(); ?>" class="arrow-down"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/news/arrow_down.png"
                                                alt="" width="40" height="auto"></a>
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
