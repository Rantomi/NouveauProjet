<?php get_header(); ?>
<div class="container">
  <h1>Single post</h1>
  <div class="row justify-content-center m-auto">
  <?php
  if ( have_posts() ) {
    while ( have_posts() ) :
      the_post();
      get_template_part( 'template-banner/content', 'single' );
  endwhile;
  };
?>
  </div>
</div>
<?php
get_footer();


