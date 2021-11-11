Content articlee
<article id="/" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
	<div class="card h-50">
		
			<?php if ( has_post_thumbnail() ): ?>
				<!-- <aside class="entry-featured-image"> -->
					<?php //echo get_the_post_thumbnail( $post->ID, 'montheme-blog-image' ); ?>
					<?php the_post_thumbnail('montheme-blog-image',['class'=>'card-img-top bd-placeholder-img','alt'=>'','style'=>'width:100%; height:182px']); ?>
				<!-- </aside> -->	
			<?php else: ?>
			 <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="40%" y="50%" fill="#dee2e6" dy=".3em">pas d'image</text></svg>
										
				
			<?php endif; ?>			
		<div class="card-body">
	<div class="entry-content">
		<?php

		echo the_excerpt();

		?>
	</div><!-- .entry-content -->			
		</div>		
		<div class="card-footer">
			<div class="entry-meta">
				<?php
				printf(

					// Translators: 1 is the post author, 2 is the category list.
					__( '<span class="post-meta-separator"><i class="fa fa-user"></i>%1$s</span><span class="post-meta-separator"><i class="fa fa-calendar"></i>%2$s</span><span class="post-meta-separator"><i class="fa fa-comment"></i>%3$s</span><span class="post-meta-separator"><i class="fa fa-folder"></i>%4$s</span>', 'montheme' ), get_the_author_link(),
					// Translators: Post time
					get_the_date( get_option( 'date_format' ), $post->ID ),
					// Translators: Number of com,ments
					montheme_get_number_of_comments( $post->ID ),
					// Translators: tag list
					get_the_tag_list( 'Tags: ', ', ', '' )
				);
				?>
			</div><!--/.entry-meta-->			
		</div>
	</div>


	<div class="clearfix"></div><!--/.clearfix-->
</article><!-- #post-## -->
