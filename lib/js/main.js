jQuery(document).ready(function($){
	// uncomment below to support placeholders in < IE10
	// $('input, textarea').placeholder();
	if( !$("html").hasClass("lt-ie9") ) {
		$(document).foundation();
		console.log("Foundation Js loaded");
	}

	// scrolling
	$('.scrollto').click(function() {
		var target = $(this).data('target');

		$('html, body').animate({
			scrollTop: $('#'+target).offset().top - 100
		}, 750);
	})

	//sticky menu (assuming only one on page)
	if($('.sticks').length > 0){
		var fromTop = $('.sticks').offset().top;

		$(window).scroll(function() {
			var windowScroll = $(window).scrollTop() + 100;

			if(windowScroll >= fromTop) {
				$('.sticks').addClass('stuck');
			} else if(windowScroll < fromTop){
				$('.sticks').removeClass('stuck');
			}
		});
	}

	//sticks width
	$('.sticks').css({
		'width': $('.sticks').width()
	});
	function sticks_width() {
		$('.sticks').removeAttr('style');
		$('.sticks').css({
			'width': $('.sticks').width()
		});
	}

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

	$(window).load(function(){
		tab_height();
	});

	$(window).resize(function(){
		tab_height();
		sticks_width();
	});
});