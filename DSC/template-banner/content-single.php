<!-- single post template //une seule article-->
<?php get_header(); ?>
    
<main class="container">

  <div class="row g-5">
    <div class="col-md-6">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        <?php wp_title(); ?>
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php the_title(); ?></h2>
        <!-- <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p> -->
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if ( has_post_thumbnail() ) { ?>
              <aside class="entry-featured-image">
                <?php echo get_the_post_thumbnail( $post->ID, 'montheme-blog-image' ); ?>
              </aside><!--/.entry-featured-image-->
            <?php } else { ?>
              <aside class="entry-featured-image">
                <?php echo '<img src="' . get_template_directory_uri() . '/images/post-image-placeholder.jpg' . '" />'; ?>
              </aside><!--/.entry-featured-image-->
            <?php } ?>
  
            <div class="entry-meta">
              <?php
              printf(

                // Translators: 1 is the post author, 2 is the category list.
                __( '<span class="post-meta-separator"><i class="fa fa-user"></i>%1$s</span><span class="post-meta-separator"><i class="fa fa-calendar"></i>%2$s</span><span class="post-meta-separator"><i class="fa fa-comment"></i>%3$s</span><span class="post-meta-separator"><i class="fa fa-folder"></i>%4$s</span>', 'montheme' ),
                get_the_author_link(),
                // Translators: Post time
                get_the_date( get_option( 'date_format' ), $post->ID ),
                // Translators: Number of com,ments
                montheme_get_number_of_comments( $post->ID ),
                // Translators: tag list
                get_the_tag_list( 'Tags: ',', ','' )
              );
              ?>
            </div><!--/.entry-meta-->
            <div class="pb-4 mb-4 fst-italic border-bottom">
            </div>
            <div class="entry-content">
              <?php
              the_content();
              ?>
            </div><!-- .entry-content -->
            <div class="clearfix"></div><!--/.clearfix-->
          </div>
          
      </article>


<!--       <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav> -->

    </div>

    <div class="col-md-6">
      <div class="position-sticky" style="top: 2rem;">
        <?=get_sidebar('page'); ?>

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
      </div>
    </div>
  </div>
  <div class="col-md-12">
      <article>
        <!-- //*********** 
                          COMMENTAIRE *************************** -->
          <?php if(comments_open() || get_comments_number()){
            comments_template();//appele du fichier Comments.php
          } ?>    
      </article>    
  </div>

</main>

<?php get_footer(); ?>

