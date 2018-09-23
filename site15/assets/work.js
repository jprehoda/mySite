var updateModalHeight = function(){
	//Calculation comes from padding and nav reductions
	var newModalHeight = window.innerHeight - (((window.innerWidth * .02) * 2) + 50);
	$('.modal-sections').css('height', newModalHeight);
	return true;
}

$('.update-modal').on('click', function(e){
	e.preventDefault();
	$('.modal-body').load('/site15/assets/examples/includes/'+$(this).attr("data-example")+'.html', function() {
		$('.about').addClass('display-section');
		updateModalHeight();
		
		$('.change-example-section').on('click', function(e){
			e.preventDefault();
			var $showThisClass = $(this).attr('data-modal-section');
			if(!$('#example-modal').find($showThisClass).hasClass('display-section')){
				$('#example-modal').find('.modal-section').removeClass('display-section');
				$($showThisClass).addClass('display-section');
			}
			return false;
		});
		
		$('.modal-nav').find('.toggle-modal').on('click', function(e){
			e.preventDefault();
			$('.modal').toggleClass('show-modal');
		});
		
		$('#example-modal').css('height', '0px');
	});
	return true;
});

$(window).on('resize orientationchange', function(){
	updateModalHeight();
	return true;
});