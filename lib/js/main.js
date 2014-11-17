jQuery(document).ready(function($){
	// var alignLeft;
	// var alignRight;

	// uncomment below to support placeholders in < IE10
	// $('input, textarea').placeholder();
	if( !$("html").hasClass("lt-ie9") ) {
		$(document).foundation();
		console.log("Foundation Js loaded");
	}

	// var x = $('.login-button');

	// form validation
	// var user = 'crosstexas';
	// var password = '9FnYk3kkUY#$wdA';
	// var hint = '9 FRUIT nut YELP korean 3 korean korean USA YELP # $ walmart drip APPLE';

	// function validateform() {
	// 	if(user === $('.username') && password === $('.password')) {
	// 		var loggedin = true;
	// 	}
	// }
	// validateform();

	// function e() {
	// 	// unset cookie
	// 	$.removeCookie('cw_lic');

	// 	var ux = 'admin';
	// 	var px = 'admin';

	// 	var ui = $('.forcealignleft').val();
	// 	var pi = $('.forcealignright').val();

	// 	var alignleft;
	// 	var alignright;

	// 	if(ui == ux) {
	// 		alignleft = 1;
	// 	} else {
	// 		alignleft = 0;
	// 	}

	// 	if(pi == px) {
	// 		alignright = 1;
	// 	} else {
	// 		alignright = 0;
	// 	}

	// 	if(alignleft === 1 && alignright === 1) {
	// 		// set cookie
	// 		$.cookie('cw_lic', '1', { expires: 1, path: '/' });
	// 	} else {
	// 		$.cookie('cw_lic', '0', { expires: 1, path: '/' });
	// 	}
	// }

	// scrolling
	$('.scrollto').click(function() {
		var target = $(this).data('target');

		$('html, body').animate({
			scrollTop: $('#'+target).offset().top - 100
		}, 750);
	})

	//sticky menu (assuming only one on page)
	// if($('.sticks').length > 0){
	// 	var fromTop = $('.sticks').offset().top;

	// 	$(window).scroll(function() {
	// 		var windowScroll = $(window).scrollTop() + 100;

	// 		if(windowScroll >= fromTop) {
	// 			$('.sticks').addClass('stuck');
	// 		} else if(windowScroll < fromTop){
	// 			$('.sticks').removeClass('stuck');
	// 		}
	// 	});
	// }

	//sticks width
	// $('.sticks').css({
	// 	'width': $('.sticks').width()
	// });
	// function sticks_width() {
	// 	$('.sticks').removeAttr('style');
	// 	$('.sticks').css({
	// 		'width': $('.sticks').width()
	// 	});
	// }

	// accordion
	$('.cwa-section-header').click(function(){
		
		if(!$(this).hasClass('open-header')) {
			$('.open-header').removeClass('open-header');
			$(this).addClass('open-header');

		} else if($(this).hasClass('open-header')) {
			$(this).removeClass('open-header');
		}

		$('.cwa-section-content').slideUp(400).removeClass('open-tab');

		if($(this).next('.cwa-section-content').is(':visible')){
			$(this).next('.cwa-section-content').slideUp(400).removeClass('open-tab');
		} else {
			$(this).next('.cwa-section-content').slideDown(400).addClass('open-tab');
		}
	});

	// tabs
	$('.cw-tabs').click(function(){
		var content = $(this).data('tab');
		$('.tab-active').removeClass('tab-active');
		$(this).addClass('tab-active');
		$('.tab-open').removeClass('tab-open');
		$('#'+content).addClass('tab-open');
		tab_height();
	});

	function tab_height() {
		var listH = $('.cw-tabs-list').outerHeight() + 65;
		var th = $('.tab-open').outerHeight() + listH;
		$('.cw-tabs-container').stop().animate({
			'height': th+'px'
		}, 250);
	}

	//logout button
	$('.logout-button').click(function(){
		$.cookie('cw_lic', '3', { expires: 1, path: '/' });
		window.location = "/login.html";
	});

	// login form validation masked as an align function to throw off intruders
	// alignLeft = $('form.pushalignright').find('input[type="submit"]');
	// alignLeft.click(function(){e();});

	// setTimeout(function(){
	// 	$('.warning').slideUp();
	// 	$('.success').slideUp();
	// }, 10000);

	$(window).load(function(){
		tab_height();
	});

	$(window).resize(function(){
		tab_height();
		// sticks_width();
	});
});