<?php get_header(); ?>
<div class="container mt-4" style="">
<h1><?php wp_title(); ?></h1>
<!-- <h2>Single Post</h2>  -->
<?php if(have_posts()): ?>
  

  <div class="row">  
    <?php while(have_posts()):the_post(); ?>
      <div class="col-md-8 m-auto">
        <img src="<?php the_post_thumbnail_url() ;?>" alt="" class="bd-placeholder-img bd-placeholder-img-lg img-fluid">
      </div>
      <div class="col-md-8 m-auto">            
        <h2><?php the_title(); ?></h2>
        <p class="text-mutted"><?php the_content(); ?></p>

        <!-- //*********** 
                          COMMENTAIRE *************************** -->
          <?php if(comments_open() || get_comments_number()){
            comments_template();//appele du fichier Comments.php
          } ?>                


      </div>
    <?php endwhile; ?>
  </div>
</div>  
<?php endif; ?> 
<?php get_footer(); ?>
