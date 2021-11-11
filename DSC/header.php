<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/logo_icon.png">  
  <title><?php bloginfo('name'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js" type="text/javascript"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>"/>
</head>
<body style="<?php echo (montheme_options('bg_color') ? 'background-color:' . montheme_options('bg_color') : '' ); ?>">
  <!-- //permet de changer la couleur de fond du header -->
<header class="header-entete d-flex " >
  <div class="header-logo-image">
    <div class="header-logo justify-content-center">
      <div id="header-logo-image">
        
        <div class="pt-4">
          
        </div>
        <?php if ( get_header_image() ) : ?>
        <a class="navbar-expand" id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img class="img" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ) ?>" style="max-width:<?php echo get_custom_header()->width.'px'; ?>"> 
        </a>
        <?php endif; ?>       
      </div>
    </div>
    
    
  </div>
  <div class="header-menu pr-auto" style="background-color:<?=get_theme_mod('header_background'); ?>;">
    <nav class="navbar navbar-expand-md navbar-dark">
      <div class="container">       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
<!--          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul> -->
          <?php wp_nav_menu([
            'theme_location'=> 'header',
            'container'=>false,
            'menu_class'=>'navbar-nav me-auto mb-2 mb-md-0',

          ]) ?>


          <?=get_search_form();  ?>
        </div>
      </div>
    </nav>
  </div>
</header>
