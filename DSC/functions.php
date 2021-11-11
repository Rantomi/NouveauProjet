<?php
//CHANGER LE WALKER DE COMMENTAIRE 
require_once('walker/CommentWalker.php');
//appeler le fichier personaliser_theme/personaliser.php
require_once('personaliser_theme/personaliser.php');

/*********************************************************************************************************************/
/************** APPELER BOOTSTRAP ************************************************************************************/
/*********************************************************************************************************************/
function appeler_bootstrap(){
	wp_register_style('bootstrap',get_template_directory_uri() .'/assets/css/bootstrap.min.css');

	wp_enqueue_style('bootstrap');
	//bootstrap.min.js aura besoin de popper et de jquery
	// cle,source,dependance,version,affichage footer
	wp_register_script('bootstrap',get_template_directory_uri() .'/assets/js/bootstrap.min.js',['popper','jquery'],false,true);
	wp_register_script('popper',get_template_directory_uri() .'/assets/js/popper.min.js',[],false,true);
	
	if(!is_customize_preview()){
		wp_deregister_script('jquery');
		wp_register_script('jquery',get_template_directory_uri() .'/assets/js/jquery-slim.min.js',[],false,true);		
	};
	wp_enqueue_script('bootstrap');	
	// Font Awesome Stylesheet
		// wp_enqueue_style( 'font-awesome-min-css', 'https://cdn.jsdelivr.net/npm/@font-awesome-free@5.15.3/css/fontawesome.min.css' );
		

			// Font Awesome Stylesheet
		wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );	
		wp_enqueue_style('font-awesome-min-css');	
}
add_action('wp_enqueue_scripts','appeler_bootstrap');

/************************************************************************************************************************/
/***********************ACTIVER L'UTILISATION D'UN LOGO******************************************************************/
/*************************************************************************************************************************/
$args = array(
	'width'         => 220,
	'height'        => 80,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
);
add_theme_support( 'custom-header', $args );

/**********************************************************************************************************************/
/**********LES OPTIONS SUPPORTER PAR LE THEME***************************************************************************/
/************************************************************************************************************************/
function montheme_dsc_support(){
	//pour les titre
	add_theme_support('title-tag');
	//Menus
	register_nav_menu('header','En téte du menu');
	// register_nav_menus( array(
	// 'topmenu'   => __( 'Top menu', 'DSCwp' )
	// ) );

	/*Ajouter une image a la une*/
	add_theme_support('post-thumbnails');
	add_theme_support('html5');
	/*redimensionner une image*/
	// add_image_size('card-header',350,215,true);
	add_image_size( 'montheme-blog-image', 462, 180, true );

	add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);


};
add_action('after_setup_theme','montheme_dsc_support');

/*************************************************************************************************************************/
/****************LE TITRE DU SITE*****************************************************************************************/
/*************************************************************************************************************************/
function montheme_title($title){
	return  $title;
}
add_filter('wp_title','montheme_title');
function montheme_title_separator(){
	return '|';
}
add_filter('document_title_separator','montheme_title_separator');

/**************************************************************************************/
/**********CHANGER LA CLASSE DU MENU UL EN BOOTSTRAP***********************************/
/**************************************************************************************/
function montheme_menu_class($classes){
	$classes[]='nav-item';
	return $classes;
	// var_dump(func_get_args());
	// die();
}
add_filter('nav_menu_css_class','montheme_menu_class');


/***************************************************************************************/
/**********CHANGER L'ATTRIBUT  DU LIEN DU MENU EN BOOTSTRAP*****************************/
/***************************************************************************************/
//
function montheme_menu_link($attrs){
	$attrs['class']='nav-link';
	return $attrs;
	// var_dump(func_get_args());
	// die();
}
add_filter('nav_menu_link_attributes','montheme_menu_link');

/***************************************************************************************/
/**********CREER UNE PAGINATION PERSONALISER AVECBOOTSTRAP******************************/
/***************************************************************************************/
function montheme_pagination(){
	$page=paginate_links(['type'=>'array']);
	if($page===null){
		return;
	}
		echo '<nav aria-label="page navigation label" class="my-2">';
			echo '<ul class="pagination">';
				foreach ($page as $page) {
					$active=strpos($page,'current')!==false;
					$class='page-item';
					if($active){
						$class.=' active';
					}					
						echo '<li class="'.$class.'">';
					echo str_replace('page-numbers','page-link',$page);
					echo '</li>';
				}
			echo '</ul>';
		echo '</nav>';	
}
/**************************************************************************************/
/******************RECUPERER LES NOMBRES DES COMMENTAIRES******************************/
/**************************************************************************************/
if ( ! function_exists( 'montheme_get_number_of_comments' ) ) {
	/**
	 * Simple function used to return the number of comments a post has.
	 */
	function montheme_get_number_of_comments( $post_id ) {

		$num_comments = get_comments_number( $post_id ); // get_comments_number returns only a numeric value

		if ( comments_open() ) {
			if ( 0 == $num_comments ) {
				$comments = __( 'No Comments', 'montheme' );
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __( ' Comments', 'montheme' );
			} else {
				$comments = __( '1 Comment', 'montheme' );
			}
			$write_comments = '<a href="' . get_comments_link() . '">' . $comments . '</a>';
		} else {
			$write_comments = __( 'Comments are off for this post.', 'montheme' );
		}

		return $write_comments;

	}
}

/*******************************************************************************************/
/***************SI LE FONCTION montheme_content_nav*****************************************/
/*******************************************************************************************/
if ( ! function_exists( 'montheme_content_nav' ) ) {
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function montheme_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
		?>
		<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'montheme' ); ?></h2>

			<?php if ( is_single() ) : ?>

				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'montheme' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'montheme' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>

				<?php if ( get_next_posts_link() ) : ?>
					<div
							class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'montheme' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div
							class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'montheme' ) ); ?></div>
				<?php endif; ?>

			<?php endif; ?>
			<div class="clear"></div>
		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
		<?php
	}
}// End if().

//*******************BREADGRUMP********************/
// if ( ! function_exists( 'montheme_breadcrumbs' ) ) {
// 	/**
// 	 * Render the breadcrumbs with help of class-breadcrumbs.php
// 	 *
// 	 * @return void
// 	 */
// 	function montheme_breadcrumbs() {
// 		$breadcrumbs = new montheme_Breadcrumbs();
// 		$breadcrumbs->get_breadcrumbs();
// 	}
// }
//Custom Post type

	// register_post_type('bien',[
	// 	'label'=>'BIEN',
	// 	'public'=>true,
	// 	'menu_position'=>3,
	// 	'menu_icon'=>'dashicons-phone',
	// 	'support'=>['title','editor','thumbnail'],
	// 	'show_in_rest'=>true,
	// 	'has_archive'=>false,

	// ]);
















/**********************************************************************************************/
/*********************CREATION D'un WIDGET SIDEBAR,YoUTUBE*************************************/
/**********************************************************************************************/
// if(function_exists('register_sidebar')){
// 	register_sidebar(2);
// }
	require_once ('widgets/YoutubeWidget.php');
function montheme_register_widget(){
	
/*CREATION D'un WIDGET YoUTUBE*/
register_widget(YoutubeWidget::class);
/*CREATION D'un WIDGET SIDEBAR*/
	register_sidebar([
		'id'=>'page',
		'name'=>'Sidebar Accueil',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		// 'before_widget'=>'<div class="p-4 mb-3 rounded %2$s" id="%1$s"> ',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	]);
}
add_action('widgets_init','montheme_register_widget');





/**************************************************************************************************/
/********PERSONALISER LA FORMULAIRE DE COMMENTAIRE EN BOOTSTRAP************************************/
/**************************************************************************************************/
add_filter('comment_form_fields',function($fields){
	$fields['email']=<<<HTML
	<div class="form-group">
	<label for="email">Email</label>
	<input type="text" class="form-control" name="email" id="email" reuired placeholder="Votre Email ">
	</div>
HTML;
	$fields['comment']=<<<HTML
	<div class="form-group">
	<label for="comment">Commentaire</label>
	<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="Votre Commentaire...."></textarea>
	</div>	
HTML;
	$fields['author']=<<<HTML
	<div class="form-group">
	<label for="author">Autheur</label>
	<input id="author" class="form-control" name="author" type="text" value=""  maxlength="245" required="required" placeholder="Autheur">
	</div>
HTML;
	$fields['url']=<<<HTML
	<div class="form-group">
	<label for="url">Site Web</label>
	<input id="url" class="form-control" name="url" type="text" value="" size="30" maxlength="200" placeholder="Site web">
	</div>
HTML;

	return $fields;
});

/***********************************************************************************************************/
/****************SI LE FONCTION montheme_comment_reply_js exist*********************************************/
/***********************************************************************************************************/
if ( ! function_exists( 'montheme_comment_reply_js' ) ) {
	/**
	 * Function that only loads the comment-reply JS script on pages that have the comment form enabled
	 *
	 * Given that we have a one page website, is_singular() will return true for pages as well (that means it gets loaded on the homepage for nothing)
	 *
	 * @since Pixova Lite 1.0.0
	 */
	function montheme_comment_reply_js() {

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'comment_form_before', 'montheme_comment_reply_js' );
}

/*************************************************************************************************************************/
/*******          FIN             ****************************************************************************************/
//*******************************************************************************************************************