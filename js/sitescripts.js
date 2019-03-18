jQuery( document ).ready(function($) {
	if(location.hash){
		$(window).scrollTop(0); //stop jump to hash straight away
		setTimeout(function(){
			$(window).scrollTop(0);
		},1);
	}

	$(window).load(function(){
		if(location.hash){
			setTimeout(function(){
				
			if ((Foundation.MediaQuery.current=='small') || (Foundation.MediaQuery.current=='medium')) {	
				var x = $(location.hash).offset().top;
			    $('html, body').animate({scrollTop: x - 25 }, 500);
			} else {
				var x = $(location.hash).offset().top;
				$('html, body').animate({scrollTop: x - 140 }, 500);				
			}					
			},1);
		}
	});

	$('a.button.scroll').click( function(){			
		myhash = "#" + $(this).data('hash');
		if ((Foundation.MediaQuery.current=='small') || (Foundation.MediaQuery.current=='medium')) {	
			var x = $(myhash).offset().top;
		    $('html, body').animate({scrollTop: x - 25 }, 500);
		} else {
			var x = $(myhash).offset().top;
			$('html, body').animate({scrollTop: x - 140 }, 500);				
		}					
	});
	
	$('.product_galleries .slider').slick({
		infinite: false,
		slidesToShow: 1, 
		slidesToScroll: 1,
		dots: false,
		autoplay: false,
		autoplaySpeed:5000,
		fade: true,
		cssEase: 'linear',
		speed: 300,
		arrows: true,
	});		
	
	$('a.phone').html(" 919-452-7500");
	$('a.phone').attr("href","tel:+1919-452-7500 ");
	
});