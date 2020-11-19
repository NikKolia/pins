<?php
/*
 * Template Name: Новости
 * 
 * */
get_header();
?>

    <section class="container newsTitle">
        <div class="row justify-content-center center">
        	<div class="col-md-12">
				<h1 class="news-h1">Pins Новости</h1>
			</div>
        </div>
    </section>			
    <section class="container newsPage">
        <div class="row justify-content-center">
        						
				<?php
				$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
				$args = array(
					'posts_per_page' => 5, // значение по умолчанию берётся из настроек - get_option('posts_per_page'), но вы можете использовать и собственное
					'paged'          => $current_page // текущая страница
				);
				query_posts( $args );
				 
				$wp_query->is_archive = true;
				$wp_query->is_home = false;
				 
				while(have_posts()): the_post();
					?>
					<div class="col-md-12">
						<div class="newsBox"> 
							<h2><?php the_title(); ?></h2>
							<p><?php the_content() /* содержимое поста */ ?></p>
						</div>
					</div>
					<?php
				endwhile;
				 
				if( function_exists('wp_pagenavi') ) wp_pagenavi(); // функция постраничной навигации
				?>
	         
        </div>
    </section>

<?php

get_footer();
