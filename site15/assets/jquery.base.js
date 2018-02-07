'use strict';

/* SWITH LAYOUT DESIGN EVERY 20 Seconds */
if(!$('body').hasClass('no-layout-switch')){
	window.setInterval(function(){
		$('body').toggleClass('alt-layout');
	}, 20000);
}

/* NAVIGATION SETUP */
$(window).on('scroll', function(){
	if (this.pageYOffset >= 1) {
		if(!$('#scroll-nav').hasClass('scrolling')){
			$('#scroll-nav').addClass('scrolling');
		}
	} else {
		if($('#scroll-nav').hasClass('scrolling')){
			$('#scroll-nav').removeClass('scrolling');
		}
	}
});

$('.operate-nav').on('click', function(e){
	var $destinationAnchor = $(this).attr('data-anchor');
	e.preventDefault();
	$('html,body').animate({
		scrollTop: $($destinationAnchor).offset().top - (parseInt($('#scroll-nav').css('height')) * 2)
	}, 500);
	if($('#slide-nav').hasClass('nav-clicked')){
		$('#slide-nav').removeClass('nav-clicked');
	}
});

var setSlideHeight = function(){
	return $('#slide-nav').css('height', (window.innerHeight - parseInt($('#scroll-nav').css('height'))) + 'px');
}

setSlideHeight();

$(window).on('orientationchange resize', function(){
	setSlideHeight();
});

$('body').on('click', function(){
	if($('#slide-nav').hasClass('nav-clicked')){
		$('#slide-nav').removeClass('nav-clicked');
	}
});

$('.toggle-nav').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('#slide-nav').toggleClass('nav-clicked');
});

$('.archive-nav').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$(this).parent().toggleClass('active-nav-item');
});


/* CONTACT FORM SETUP */
if(window.location.search.indexOf('formSubmit=true') >= 0 && $('#contact-form').length > 0){
	$('#contact-form').addClass('show-modal');
}

$('.toggle-modal').on('click', function(e){
	e.preventDefault();
	$('.modal').toggleClass('show-modal');
});

if(window.innerHeight < 768){
	$('.modal').css('height', window.innerHeight +'px');
}

$('.contact-submit-button').on('click', function(e){
	e.preventDefault();
	var captchaPassed = true;

	//CHECK IF RECAPTCHA HAS BEEN SELECTED
	if((grecaptcha.getResponse()).length <= 0){
		$('.captcha-error').show();
		captchaPassed = false;
		return false;
	}
	
	if(captchaPassed){
	   $("#contact-joe-prehoda").submit();
	}
});


/* CIRCLE HOVER */
$('#hover-circle').mouseover(function(){
	$(this).addClass('circle-hovered');
});
$('#hover-circle').mouseout(function(){
	$(this).removeClass('circle-hovered');
});