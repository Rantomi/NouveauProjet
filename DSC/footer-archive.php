<footer class="bg-light">
  <div class="container">
    <div class="row justify-content-center mr-auto">
      <div class="col-md-4 text-center">
        <h5>Nous Contactez</h5>
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
      <div class="col-md-4 text-center">
        
        <img class="img img-fluid img-responsive" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ) ?>" style="max-width:<?php echo get_custom_header()->width.'px'; ?>"> 
      </div>
      <div class="col-md-4 m-auto">
          <div class="plain">
              <h4 class="text-center">Digital Support Company</h4>
              <ul class="list" style="list-style:none;">
                <li><a href="#"><i class="icon fa fa-phone " style="border-radius:100%">&nbsp;</i>+261 32 84 241 49</a></li>
                <li><a href="#"><i class="icon fa fa-cogs " style="border-radius:100%">&nbsp;</i>WWW.DSC.COM</a></li>
                <li><a href="#"><i class="icon fa fa-instagram " style="border-radius:100%">&nbsp;</i>Lorem Ipsum</a></li>
                <li><a href="#"><i class="icon fa fa-github " style="border-radius:100%">&nbsp;</i>Github</a></li>
              </ul>
          </div>              
      </div>
    </div>
<div class="row justify-content-center m-auto">
	<div class="col-md-8  border- justify-content-center m-auto text-center">
		<p>Copyright&copy;2021 Digital Support Company. &middot;</p>
		<?php wp_footer(); ?>
	</div>
</div>
  </div>
</footer>
       
	
</body>
</html>