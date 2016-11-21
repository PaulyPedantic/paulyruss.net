// Hide footer on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var footerHeight = $('footer').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > footerHeight){
        // Scroll Down
        $('footer').removeClass('bottom-out').addClass('bottom-in');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('footer').removeClass('bottom-in').addClass('bottom-out');
        }
    }

    lastScrollTop = st;
}

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
