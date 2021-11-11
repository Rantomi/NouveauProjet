<footer class="footer m-auto">
  
<?php

$check_footer_theme_copyright_enable = get_theme_mod( 'montheme_copyright_enable', 1 );
$text_footer_theme_copyright_message = get_theme_mod( 'montheme_copyright', sprintf( '&copy; %s', esc_html__( 'Copyright 20', 'pixova-lite' ) . sprintf( '%s', date( 'y' ) ) . esc_html__( '. Tous Droit Reservér', 'Digital Support Company' ) ) );
$sidebar_args                        = array(
  'before_title' => '<h3 class="widget-title"><span>',
  'after_title'  => '</span></h3>',
);

?>

    
    
      <div class="container">
        <div class="row m-auto justify-content-between mr-auto">
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
            <ul class="list-inline mt-5">
            <li class="list-inline-item mr-3">
             <a class="btn btn-info btn-social mx-1" href="#!"><i class="fa fa-facebook fa-2x fa-fw"></i></a>
            </li>
            <li class="list-inline-item mr-3">
              <a class="btn btn-info btn-social mx-1" href="#!"><i class="fa fa-fw fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="www.instagram.facebook">
                 <a class="btn btn-info btn-social mx-1" href="#!"><i class="fa fa-instagram fa-2x fa-fw"></i></i></a>
              </a>
            </li>                        
            </ul>           
          </div>
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
            <!-- <img class="img img-fluid img-responsive" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ) ?>" style="max-width:<?php echo get_custom_header()->width.'px'; ?>">    -->
            <h1>Bonjour</h1>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0 list" style="list-style:none;">
                    <li class="mb-2"><a href="#" style="color:#000530;font-family:Ubuntu bold"><i class="icon fa fa-phone " style="border-radius:100%;">&nbsp;</i>+261 32 84 241 49</a></li>
                    <li class="mb-2"><a href="#" style="color:#000530;font-family:Ubuntu bold"><i class="icon fa fa-cogs " style="border-radius:100%;">&nbsp;</i>WWW.DSC.COM</a></li>
                    <li class="mb-2"><a href="#" style="color:#000530;font-family:Ubuntu bold"><i class="icon fa fa-instagram " style="border-radius:100%;">&nbsp;</i>Lorem Ipsum</a></li>
                    <li class="mb-2"><a href="#" style="color:#000530;font-family:Ubuntu bold"><i class="icon fa fa-github " style="border-radius:100%;">&nbsp;</i>Github</a></li>
                  </ul>           
          </div>
        </div> <!-- /.row-->
      </div> <!-- /.container -->

      <div class="fluid-container">
        <div class="footer-copyright-container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center">
                <p class="footer-copyright bg-secondary">

                  <?php

                  if ( $check_footer_theme_copyright_enable ) {
                  ?>

                    <span class="montheme-footer-theme-copyright">
                    <?php _e( 'Theme:', 'montheme' ); ?> <a href="<?php echo esc_url( 'https://colorlib.com/wp/themes/DSC' ); ?>" target="_blank" rel="nofollow noopener" title="<?php _e( 'Free One Page Parallax WordPress Theme', 'montheme' ); ?>"><?php _e( 'Digital Support Company', 'montheme' ); ?></a>
                    &middot;
                    </span><!--/.pixova-lite-footer-theme-copyright-->
                    <?php } ?>

                  <span class="montheme-footer-text-copyright">
                    <?php echo wp_kses_post( $text_footer_theme_copyright_message ); ?>
                  </span><!--/.pixova-lite-footer-text-copyright-->
                </p>
              </div><!--/.text-center-->
            </div><!--/col-lg-12-->
          </div><!--/.row-->
        </div><!--/.footer-copyright-container-->
      </div><!--/.fluid-container-->
  
    
  
    
  
</footer>
  
      <?php wp_footer(); ?>
  </body>
</html>