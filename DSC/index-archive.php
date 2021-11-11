<?php get_header(); ?>
<div class="container bg-light" style="">
<!-- <p class="text-info">bonjour tous le monde: <?php wp_title(); ?> Index.php </p>  -->
<h1 class="h1"><?php wp_title(); ?></h1> 
<!-- <h2>Post page (page d'article) </h2> -->
<?php if(have_posts()): ?>
  <div class="row  row-cols-1 row-cols-md-2 g-4">
    <?php while(have_posts()):the_post(); ?>
      <div class="col">
        <!-- //post-thumbnail,medium,large ex:card-header -->
        <div class="card h-100">
          
            <?php the_post_thumbnail('card-header',['class'=>'card-img-top img-responsive img-fluid','alt'=>'','style'=>'width:100%; height:180']); ?>
          
          <div class="card-body">

            
            
           
            <div class="row">
              <div class="col-md-4"><h5 class="card-title"><?php the_title(); ?></h5> </div>
              <div class="col-md-4"><h6 class="card-text"><?php the_category(); ?></h6></div>
              <time class="updated" datetime="<?php echo esc_attr( get_the_time('c') ); ?>" pubdate><?php echo get_the_date(); ?></time>  
            </div>
             <p href="#" class="text-mutted"><?php the_content('Lire la suite'); ?></p>            
          </div>
          <div class="card-footer text-muted">
          	<a href="<?php the_permalink(); ?>" class="btn btn-outline-secondary card-link">Voir plus</a>
          	<?php comments_popup_link('pas de commentaire','un commentaire','% commentaire'); ?>
            	
          </div>
        </div>        
      </div>  
    <?php endwhile; ?>

  </div>
  <?php 
    //the_posts_pagination();
    montheme_pagination();
   ?>

</div>  
 
<?php else: ?>
  <h1>Pas d' article</h1>
<?php endif; ?> 
<?php get_footer(); ?>
