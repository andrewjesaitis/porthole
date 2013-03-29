/*Slider
By: Andrew Jesaitis*/

$(document).ready(function () {

var $panels = $('#mid .scrollContainer > div');
var $container = $('#mid .scrollContainer');
var horizontal = false; //change this option to false to have a vertical slider
//create and tidy up the scroll object
var $scroll = $('#mid .scroll').css('overflow', 'hidden');

//set CSS if going horizontal
if (horizontal) {
	$panels.css({
		'float' : 'left',
		'position' : 'relative' //IE fix
	});
	//set width of horizontal container
	$container.css('width', $panels[0].offsetWidth * $panels.length);
	
	//drop in left and right buttons
	 var $prev = $('<div class="scrollButton left"><a href="#">&laquo;</a></div>');
	 var $next = $('<div class="scrollButton right"><a href="#">&raquo;</a></div>');
	 $scroll.before($prev);
	 $scroll.after($next);
}
else{
	var $prev = $('<div class="scrollButton up"><a href="#">&uArr;</a></div>');
	var $next = $('<div class="scrollButton down"><a href="#">&dArr;</a></div>');
	$scroll.after($prev);
	$scroll.after($next);
}

//correct for padding
var offset = parseInt((horizontal ?
	$container.css('paddingTop') :
	$container.css('paddingLeft'))
	|| 0) * -1;
	
var scrollOptions = {
	target: $scroll, //element with overflow
	items: $panels, //what's stuffed in the target
	prev: $prev, //selector to scroll "back"
	next: $next, //selector to scroll "forward"
	axis: 'xy', //coordinate system for scroll effect
	//onAfter: trigger, //final callback
	offset: offset, //adjusting for padding issues
	duration: 500, //how long effect lasts
	easing: 'swing', //easing method
};

$('#mid').serialScroll(scrollOptions);
$.localScroll(scrollOptions);

//if URL has hash we want it to scroll very fast (can't see it) to that hash
scrollOptions.duration = 1;
$.localScroll.hash(scrollOptions);

//functionality for closing title box
$('.close').click(function() {
       				$('.fade-title').fadeOut("slow");
       				$('.fade-title-margin').fadeOut("slow");
				});

});