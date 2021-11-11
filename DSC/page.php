<!-- page par defaut -->
<?php get_header(); ?>
    
<main class="container has-padding">

  <div class="row g-5">
    <div class="col-md-12">
      <article class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <!-- <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p> -->
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="h1"><?php wp_title(); ?></h1>
                <div class="entry-content">
                  <?php
                  the_content();
                  ?>
                </div>            
          </div>  
   
      </article>
      <!-- <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav> -->

    </div>

    <div class="col-md-12">
      <div class="position-sticky" style="top: 2rem;">
        
          <?php
          // Si le sidebar existe dans l'admin
           // if ( is_active_sidebar( 'page' ) ) {
           //  dynamic_sidebar( 'page' );
           // }
          ?>        
      </div>
    </div>
  </div>

</main>

<?php get_footer(); ?>

