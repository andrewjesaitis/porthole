/*Menu
By: Andrew Jesaitis*/


$(document).ready(function(){	
	$("#nav ul").css({display: "none"}); // Opera Fix
	$("#nav li").hoverIntent(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(10);
			},function(){
			$(this).find('ul:first').css({visibility: "hidden"}).hide(10);
			});

});