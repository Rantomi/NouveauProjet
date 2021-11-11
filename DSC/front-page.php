<?php get_header(); ?>
<div class="main container">
<?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
</div>



	<!-- <div class="container">
		<?php while(have_posts()):the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
			<a href="<?=get_post_type_archive_link('post') ?>" class="btn btn-info">Voir les dernier actualités</a>
		<?php endwhile; ?>	

	</div> -->
  
<?php get_footer(); ?>