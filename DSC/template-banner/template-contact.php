<?php 
/**
* Template Name: Page contact
*/

?>
<?php get_header(); ?>
<div class="container bg-light">
	<h1 class="h1"><?php wp_title(); ?></h1>
  <?php if(have_posts()): ?>
    <?php while(have_posts()):the_post(); ?>
      <div class="row mb-2 mr-auto justify-content-center">
        <div class="col-md-8">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary"><?php the_title(); ?></strong>
              
              
              <p class="card-text mb-auto"><?php the_content(); ?></p>
              
            </div>
          </div>
        </div>
      </div>      
    <?php endwhile; ?>
  <?php endif; ?>    
</div>
<?php get_footer(); ?>