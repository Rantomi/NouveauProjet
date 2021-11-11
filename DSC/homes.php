

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="has-padding">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			
			
		<?php while(have_posts()):the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
			<a href="<?=get_post_type_archive_link('post') ?>">Voir les dernier actualités</a>
		<?php endwhile; ?>	
			

			</div><!--/.col-lg-8-->

			<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
				<aside class="pixova-blog-sidebar">
					<?php
					if ( is_active_sidebar( 'blog-sidebar' ) ) {
						dynamic_sidebar( 'blog-sidebar' );
					} else {
						the_widget( 'WP_Widget_Search', sprintf( 'title=%s', __( 'Search', 'montheme' ) ) );
						the_widget( 'WP_Widget_Calendar', sprintf( 'title=%s', __( 'Calendar', 'montheme' ) ) );
					}
					?>
				</aside role="sidebar"> <!--/.pixova-blog-sidebar-->
			</div><!--/.col-lg-3-->

			<nav class="pixova-custom-pagination col-lg-12">
				<?php the_posts_pagination(); ?>
			</nav><!--/.pixova-custom-pagination-->
		</section><!--/section-->
	</div><!--/.row-->
</div><!--/.container-->

<?php get_footer(); ?>
