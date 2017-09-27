/*
 Require Basic Modules
 */
 $ = jQuery = require('jquery');




/**
Nprogress loading bar
*/
var NProgress = require('NProgress');

/**
 * partcles js load
 */

// var particlesJS = require('particlesJS');

/**
 * Bootstrap loading
 */

 var bootstrap = require('bootstrap');

/**
 * Jquery Scrollify
 */

 require('jquery-scrollify')(window);

 //var niceScroll = require('jquery.nicescroll');

 //$("html").niceScroll({mousescrollstep:70,cursorcolor:"#0c84e4",autohidemode: "scroll",cursorwidth:"7px",cursorborderradius:"3px",cursorborder:"none",hwacceleration: true,});

/**
 * require wow js
 */

//var WOW = require('wowjs');


/*
particlesJS.load('part', 'assets/particles.json', function() {
	console.log('callback - particles.js config loaded');
});
*/

var ar = ["<i class='fa fa-quote-left'></i> Java is to JavaScript what Car is to Carpet. <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> The best thing about a boolean is even if you are wrong, you are only off by a bit <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> There are two ways to write error-free programs; only the third one works. <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> One man&#8217;s crappy software is another man&#8217;s full time job. <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> while(!(success == try())) <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> In order to understand recursion, one must first understand recursion. <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> Computers are good at following instructions, but not at reading your mind. <i class='fa fa-quote-right'></i>",
"<i class='fa fa-quote-left'></i> One of my most productive days was throwing away 1000 lines of code. <i class='fa fa-quote-right'></i>"];

NProgress.start();  
NProgress.set(0.6); 


$(window).on('load', function() { 
		setTimeout(function() {
			NProgress.done(); 
		}, 500);
		

	})


var timeout = 3000;

function myLoop()
{

	var i=0;
	var loopx = function() {
		$("#texter").addClass('animated fadeInUp').html(ar[i]).delay(2950).queue(function (next) {

			$(this).removeClass('animated fadeInUp').delay(1000);
			$(this).dequeue();
		});

		if(++i >= ar.length)
			i = 0;  

	};
	//
	setInterval(loopx, timeout);

}




$(function() {

	myLoop(); 
	$.scrollify({
		section:".sections",
		interstitialSection:".sectionsFull",
		setHeights: false
	});
	$.scrollify.disable();
});



$("#myonoffswitch3").click(function()
{
	if($('#myonoffswitch3').is(":checked"))
	{		
		$.scrollify.enable();
	}
	else
	{				
		$.scrollify.disable();
	}

});

$(".know").click(function(e)
{
	console.log(e.target.id);
	$('#myData').modal('show');

});








$(function() {
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});




});

/**
 * scroll blur
 */


 $(window).scroll(function() 
 {

 	var top_dist = $(window).scrollTop()/70;

 	if(top_dist<=10)
 		$('#header-top').css("filter","blur("+top_dist+"px)");


 });

 function getRandomInt(min, max) 
 {
 	return Math.floor(Math.random() * (max - min + 1)) + min;
 }
var isMobile = false; //initiate as false
// device detection
if (/Mobi/.test(navigator.userAgent))
	isMobile = true;





