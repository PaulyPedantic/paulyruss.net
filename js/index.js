$(document).ready(function() {

	//make data-toggle collapse after clicking navbar link	
	$(".navbar-nav li a").click(function(event) {
		$(".navbar-collapse").collapse('hide');
	});

//change shape of portfolio items on hover

	$('.workItem').mouseenter(function() {
		$(this).removeClass('img-circle').addClass('img-rounded');
	});
	$('.workItem').mouseleave(function() {
		$(this).removeClass('img-rounded').addClass('img-circle')
	});
});