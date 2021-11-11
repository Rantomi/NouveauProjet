<?php 
/**
* Template Name: Page plein Ecran
*/

?>
<?php get_header(); ?>
<div class="container bg-light">
  <!-- <h1>PAGES <?php wp_title(); ?></h1> -->
  <h1 class="h1"><?php wp_title(); ?></h1>
<main class="container">

  <div class="row g-5">
    <div class="col-md-12">


      <?php
        while ( have_posts() ) :
        the_post();
      ?>

              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row">
                  <div class="col-md-12">
                  <?php
                  the_content();

                  ?>         
                             
                  </div>
                </div>

                </div><!-- .entry-content -->
              </div><!-- #post-## -->
            <?php comments_template(); ?>

      <?php
      endwhile; // end of the loop.
      ?>

    </div>

<!--     <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;"> -->
  
    <?php// echo get_sidebar('page'); ?>

<!--         <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div> -->
<!--       </div>
    </div> -->
  </div>

</main> 
</div>
<?php get_footer(); ?>