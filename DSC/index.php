<?php get_header(); ?>

	<div class="container">
		<div class="row m-auto">
			<!-- <section class="has-padding mr-auto"> -->
					<?php if ( have_posts() ) {  ;?>
						<?php while ( have_posts() ) {; ?>
							<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 justify-content-center m-auto">
							<?php the_post(); ;?>

							<?php get_template_part( 'template-banner/content', get_post_format() ); ?>
							</div><!--/.col-lg-8-->
						<?php }; ?>
					<?php }; ?>
				
					<?php //the_posts_pagination(); ?>
				
				
			<!-- </section> --><!--/section-->
					<?php 
						//the_posts_pagination();
						montheme_pagination();
					?>
		</div><!--/.row-->
	</div><!--/.container-->

<?php get_footer(); ?>
