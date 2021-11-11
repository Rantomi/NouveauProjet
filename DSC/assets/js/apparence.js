// log.
(function($,log){
	wp.customize('header_background',function(value){
		value.bind(function(newVal){
			$('.header-menu').attr('style','background:'+ newVal +'!important')
			// console.log('En tet menu',newVal);
		});
	});
})(jQuery);