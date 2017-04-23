//Carousel Init
$(function() {
	$("#resume").jCarouselLite({
		btnNext: "#resume .next", btnPrev: "#resume .prev",	visible: 1,	circular: true
	});
	$("#dailyWork").jCarouselLite({
		btnNext: "#dailyWork .next", btnPrev: "#dailyWork .prev",	visible: 1,	circular: true
	});
	$("#currentPortfolio").jCarouselLite({
		btnNext: "#currentPortfolio .next", btnPrev: "#currentPortfolio .prev",	visible: 1,	circular: true
	});
	$("#catalyst").jCarouselLite({
		btnNext: "#catalyst .next", btnPrev: "#catalyst .prev",	visible: 1,	circular: true
	});
	$("#choiceAwards").jCarouselLite({
		btnNext: "#choiceAwards .next", btnPrev: "#choiceAwards .prev",	visible: 1,	circular: true
	});
	$("#prepzone").jCarouselLite({
		btnNext: "#prepzone .next", btnPrev: "#prepzone .prev",	visible: 1,	circular: true
	});
	$("#oldPortfolio").jCarouselLite({
		btnNext: "#oldPortfolio .next", btnPrev: "#oldPortfolio .prev",	visible: 1,	circular: true
	});
	$("#facebook").jCarouselLite({
		btnNext: "#facebook .next", btnPrev: "#facebook .prev",	visible: 1,	circular: true
	});
});

//jQuery Initialize
$(document).ready(function() {
	//fancybox Init
	$(".lightbox").fancybox({
		'overlayColor' : '#000', 'overlayOpacity' : 0.3, 'transitionIn' : 'elastic', 'transitionOut' : 'elastic', 'padding' : '0px'
	});
	//fancybox Init
	$(".carouselImage").css("display","block");
});