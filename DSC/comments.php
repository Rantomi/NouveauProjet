<?php
use MonTheme\CommentWalker;
if ( post_password_required() ) {
  return;
}
?>

<?php 
  $count=absint(get_comments_number());

?>




    <article class="my-3 " id="card">
      <div id="comments" class="comments-area">
      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
      <?php if($count >0):?>
        <h3><?= $count  ?> Commentaire<?=$count >1 ? 's' :'';  ?> </h3>
        
      <?php endif; ?>
        <span class="d-flex align-items-center">Laisser un commentaire</a>
      </div>

      <div>
        <div class="bd-example">
        <div class="row  row-cols-1 row-cols-md-2 g-4">
          <?php if ( have_comments() ) : ?>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
               <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav>
          <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">      <span class="nav-previous"><?php previous_comments_link( __( 'Ancien Commentaire', 'monthem' ) ); ?></span></button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="nav-next"><?php next_comments_link( __( 'Nouveau Commentaire', 'monthem' ) ); ?></span></button>
          </div>
        </nav>
                
                <?php endif; ?>               
                <p class="text-center">
                  <div class="media-list comment-list">
                  <?php
                  
                  $args = array(
                    
                    'max_depth'         => '',
                    'style'             => 'div',
                    'callback'          => null,
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => 'Répondre',
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 36,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => 'html5',
                    'short_ping'        => false,
                    'echo'              => true,
                    'walker'=>new CommentWalker(),

                  );
                   wp_list_comments($args);
                  ?>
                  </div>                  
                </p>
                
              </div>
              <div class="col-md-12 text-muted">
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <div class="nav-links">

                  <?php paginate_comments_links(); ?>

                </div><!-- .nav-links -->                
                <?php endif; ?>

              </div>
            </div>
          </div>
    <?php endif; ?>     
          <div class="col-md-12">
            <div class="form-control bg-light">
              <?php 
                // If comments are closed and there are comments, let's leave a little note, shall we?
              if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
              ?>
              <p class="no-comments"><?php _e( 'Comments are closed.', 'monthem' ); ?></p>
              <?php endif; ?>

            <?php if(comments_open()): ?>
              
              <?php comment_form(['title_reply' => '']); ?> <!-- class_form,class_submit -->
            <?php endif; ?>              
            </div>
          </div>

        </div>
        </div>
      </div>
    </div>  
    </article>







