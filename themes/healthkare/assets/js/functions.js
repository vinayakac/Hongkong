/*------------------------------------
	Theme Name: Healthkare
	Start Date : 
	End Date : 
	Last change: 
	Version: 1.0
	Assigned to:
	Primary use:
---------------------------------------*/
/*	
	
	* Document Scroll		
		
	* Document Ready
		- Consultation Section
		- Mission Section
		- Welcome Section
		- Testimonial Section
		- Responsive Caret
		- Scrolling Navigation
		- Add Easing Effect
		- Search
		- Client Carousel
		- Blog Client Carousel
		- Department Carousel
		- Team Carousel
		- Video Section
		- Gallery Section
		- Counter Section
		- Date Picker

	* Window Load
		- Site Loader
*/

(function($) {

	"use strict"
	
	/* - Consultation Section */
	function consultation_img() {
		var width = $(window).width();
		var cnt_height = $(".consultation-section .consultation-content").height();	
		if( width >= 320 ) {
			$(".consultation-section .consultation-img").css("height", cnt_height + 180);
		}
	}
	
	/* - Mission Section */
	function mission_img() {
		var width = $(window).width();
		var cnt_height = $(".mission-section .mission-details").height();	
		if( width >= 1200 ) {
			$(".mission-section .mission-img").css("height", cnt_height + 224);
		} 
		else if( width >= 320 && width <= 991 ){
			$(".mission-section .mission-img").css("height", "auto");
		}
	}
	
	/* - Welcome Section */
	function welcome_img() {
		var width = $(window).width();
		var welcome_section_height = $(".welcome-section").height();
		var welcome_content_height = $(".welcome-details").height();
		var welcome_image = $( ".welcome-img" );
		var welcome_img = welcome_image.attr("data-image");
		
		if ( width >= 992 ) {
			welcome_image.removeAttr("style");
			$( ".welcome-img img" ).remove();
			welcome_image.css({"background-image":"url('" + welcome_img + "')","height": welcome_section_height });
		} else {
			welcome_image.removeAttr("style");
			$( ".welcome-img img" ).remove();
			welcome_image.append("<img src='"+ welcome_img +"' />")
		}
	}
	
	/* - Testimonial Section */
	function testimonial_img() {
		var width = $(window).width();
		var testimonial_section_height = $(".testimonial-section3").height();
		var testimonial_content_height = $(".testimonial-left-img").height();
		var testimonial_image = $( ".testimonial-right-img" );

		if ( width >= 992 ) {
			testimonial_image.removeAttr("style");
			$( ".testimonial-right-img img" ).remove();
			var testimonial_img = $(".testimonial-right-img .testi-img").attr("data-image");
			testimonial_image.css({"height": testimonial_section_height });
			$( ".testimonial-right-img .testi-img" ).css({"background-image":"url('" + testimonial_img + "')","height": testimonial_section_height });
		} else {
			testimonial_image.removeAttr("style");
			$( ".testimonial-right-img .testi-img" ).removeAttr("style");
			$( ".testimonial-right-img img" ).remove();
			var testimonial_img = $(".testimonial-right-img .testi-img").attr("data-image");
			$( ".testimonial-right-img .testi-img" ).append("<img src='"+ testimonial_img +"' />");
		}
	}
	
	/* - Menu Switch */
	function menu_switch(){
		var width = $(window).width();
		if( width > 991 ) {
			$(".menu-switch > a").on("click", function() {
				$(".ownavigation .navbar-nav").toggleClass("menu-open")
			});
		} else {
			$(".ownavigation .navbar-nav").removeClass("menu-open");
		}
	}
	
	/* - Responsive Caret */
	function menu_dropdown_open(){
		var width = $(window).width();
		if($(".ownavigation .nav li.ddl-active").length ) {
			if( width > 991 ) {
					$(".ownavigation .nav > li").removeClass("ddl-active");
					$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
				}
		} else {
			$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
	
	/* + Expand Panel Resize */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header_s #slidepanel").length ) {
				$(".header_s #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* - Gallery Video Height */
	function gallery_video_height() {
		var width = $(window).width();
		var cnt_height = $(".gallery-section .portfolio-list li img").height();
		$(".gallery-section .portfolio-list li iframe").css("height", cnt_height);	
	}	
	
	/* - Blog Video Height */
	function blog_video_height() {
		var width = $(window).width();
		var cnt_height = $(".blog-section.latest-news article .entry-cover img").height();
		$(".blog-section.latest-news article .entry-cover iframe").css("height", cnt_height);	
	}
	
	function sticky_menu() {
		var menu_scroll = $('header[class*="header_s"]').offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".header_s .ownavigation").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".header_s .ownavigation").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
	
	/* ## Document Ready  */
	
	$(document).ready(function($) {

		/* - Scrolling Navigation */
		var width	=	$(window).width();
		var height	=	$(window).height();

		/* - Set Sticky Menu */
		if( $(".menusticky .ownavigation").length ) {
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {	
			var $anchor = $(this);			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");			
			e.preventDefault();
		});

		/* - Responsive Caret */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Expand Panel */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* - Collapse Panel  */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* Switch buttons from "Log In | Register" to "Close Panel" on click * */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});
		
		
		/* ## iPad & iPhone Touched function: */
		$('.offer-section .offer-box ').on('click touchend', function(e) {
			var el = $(this);
		})
		
		/* ## iPad & iPhone Touched function:: Price Table */
		$('.pricing-section .pricing-box').on('click touchend', function(e) {
			var el = $(this);
		})

		
		/* - Color Switcher */
		if( $('#choose_color').length ) {
				
			$("#default" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/default.css");
				return false;
			});

			$("#red" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/red.css");
				return false;
			});
			
			$("#skyblue" ).on( 'click' , function()
			{
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/skyblue.css");
				return false;
			});

			$("#orange" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/orange.css");
				return false;
			});

			$("#coral" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/coral.css");
				return false;
			});

			$("#cyan" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/cyan.css");
				return false;
			});

			$("#khaki" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/khaki.css");
				return false;
			});

			$("#pink" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/pink.css");
				return false;
			});
			
			$("#slateblue" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/slateblue.css");
				return false;
			});
			$("#gold" ).on( 'click' , function() {
				$("#healthkare-theme-color-css" ).attr("href", templateUrl + "/assets/css/color-schemes/gold.css");
				return false;
			});
			
			// picker buttton
			$(".picker_close").on("click", function() {
				$("#choose_view").removeClass("position");
				$("#choose_color").toggleClass("position");
			});
		}
		
		$(".color-switcher-block li a").on("click", function() {
		  $(".color-switcher-block li").removeClass("active");
			$(this).parent().addClass("active");
		});
		
		/* - Menu Switch */
		if($(".menu-switch").length){
			menu_switch();
		}
		
		panel_resize();
		
		/* - Select Box */
		$( "select:not(.wpcf7-form-control)" ).wrap( "<div class='select_box'></div>" );
		
		/* - Search */
		if($(".search-box").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box > span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		/* - Client Carousel */
		if( $(".clients-carousel").length ) {
			$(".clients-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: false,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					600:{
						items: 3
					},
					1000:{
						items: 6
					}
				}
			});
		}
		
		/* - Blog Client Carousel */
		if( $(".blog-clients-carousel").length ) {
			$(".blog-clients-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: false,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					600:{
						items: 3
					},
					1000:{
						items: 3
					}
				}
			});
		}
		
		/* - Client Carousel */
		if( $(".clients-carousel").length ) {
			$(".clients-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: false,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					600:{
						items: 3
					},
					1000:{
						items: 6
					}
				}
			});
		}
		
		/* - Department Carousel */
		if( $(".department-carousel").length ) {
			$(".department-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: true,
				dots: false,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					500:{
						items: 2
					},
					600:{
						items: 2
					},
					1000:{
						items: 3
					}
				}
			});
		}
		
		/* - Team Carousel */
		if( $(".team-carousel").length ) {
			$(".team-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: false,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					480:{
						items: 2
					},
					767:{
						items: 3
					},
					768:{
						items: 2
					},
					/* 991:{
						items: 2
					}, */
					1000:{
						items: 3
					}
				}
			});
			/* - Custom Navigation Events */
			$(".next").on("click",function(){
				$(".team-carousel").owlCarousel().trigger("next.owl.carousel");
			});
			$(".prev").on("click",function(){
				$(".team-carousel").owlCarousel().trigger("prev.owl.carousel");
			});
		}
		
		/* - Video Section */
		if( $(".video-section").length ){
			$(".video-section a").magnificPopup({
				disableOn: 700,
				type: "iframe",
				mainClass: "mfp-fade",
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});
		}
		
		/* - Gallery Section */		
		if( $(".content-image-block").length ){
			$(".content-block-hover").magnificPopup({
				delegate: "a.zoom-in",
				type: "image",
				tLoading: "Loading image #%curr%...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: false,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',				
				}
			});
		}
		
		if($(".content-image-block").length ){
			$(".content-block-hover a.popup-video").magnificPopup({
				disableOn: 700,
				type: "iframe",
				mainClass: "mfp-fade",
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});
		}	
		
		/* - Counter Section */
		if($(".counter-section").length) {
			$(".counter-section").each(function ()
			{
				var $this = $(this);
				var myVal = $(this).data("value");

				$this.appear(function()
				{		
					var statistics_item_count = 0;
					var statistics_count = 0;					
					statistics_item_count = $( "[id*='statistics_count-']" ).length;
					
					for(var i=1; i<=statistics_item_count; i++)
					{
						statistics_count = $( "[id*='statistics_count-"+i+"']" ).attr( "data-statistics_percent" );
						$("[id*='statistics_count-"+i+"']").animateNumber({ number: statistics_count }, 4000);
					}				
				});
			});
		}
		
		
		/* - Consultation Section */
		consultation_img();
		
		/* - Mission Section */
		mission_img();
		
		/* - Welcome Section */
		welcome_img();
		
		/* - Testimonial Section */
		testimonial_img();
		
		/* - DatePicker */
		if ( $('[type="date"]').prop('type') != 'date' ) {
			$('[type="date"]').datepicker();
		}
		
		/* Gallery Video Hieght */
		gallery_video_height();
		
		/* Blog Video Hieght */
		blog_video_height();
		
		/* - Gallery Pagination */
		var $newdiv1 = $( ".gallery-section .navigation.pagination" ),
		existingdiv1 = document.getElementById( "<div class='container'></div>" );
		$( ".gallery-section .row" ).append( $newdiv1, [ existingdiv1 ] );
		
		/* - Gallery Full With Pagination */
		var $newdiv1 = $( ".gallary-full .navigation.pagination" ),
		existingdiv1 = document.getElementById( "<div class='gallary-5-cols'></div>" );
		$( ".gallary-full .full-items" ).append( $newdiv1, [ existingdiv1 ] );
		
		if($(".service-section").length) {
			$('.service-section .welcome-box a.mfp-content').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,			  
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'			  
			});
		}
		
		if($(".service-section").length) {
			$('.service-section .services-box a.mfp-content').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,			  
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'			  
			});
		}
		
		if($(".quality-section").length) {
			$('.quality-section .quality-box a.mfp-content').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,			  
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'			  
			});
		}
		
		if( $(".top-header .support-link .language-dropdown").length == 1 ) {
			$(".top-header .support-link .language-dropdown ul").addClass("dropdown-menu");
		}
		else {
			$(".top-header .support-link .language-dropdown ul").removeClass("dropdown-menu");
		}
		
	});	/* - Document Ready /- */
	
	/* Event - Window Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu* */
		if( $(".menusticky .ownavigation").length ) {
			sticky_menu();
		}
	});

	$( window ).on("resize",function() {
		
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Expand Panel Resize */
		panel_resize();
		
		/* - Consultation Section */
		consultation_img();
		
		/* - Mission Section */
		mission_img();
		
		/* - Welcome Section */
		welcome_img();
		
		/* - Testimonial Section */
		testimonial_img();
		
		/* - Menu Switch */
		if($(".menu-switch").length){
			menu_switch();
		}
		
		/* Gallery Video Hieght */
		gallery_video_height();
		
		/* Blog Video Hieght */
		blog_video_height();
		
	});
	
	/* ## Window Load */
	$(window).on("load",function() {
		
		/* - Site Loader* */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		/* - Gallery Section */	
		if( $(".portfolio-list").length ) {
			var $container = $(".portfolio-list");
			$container.isotope({
			  itemSelector: ".portfolio-list > li",
			  gutter: 0,
			  transitionDuration: "0.5s"
			});

			$("#filters a").on("click",function(){
				$("#filters a").removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });		
				return false;
			});
		}
		
		/* Gallery Video Hieght */
		gallery_video_height();
		
	});
	
	if( $('.social-share').length ) {
		$('.social-share > li > a', this).on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();

			var data_action = $(this).attr('data-action');
			var data_title = $(this).attr('data-title');
			var data_url = $(this).attr('data-url');

			if( data_action == 'facebook' ) {		
				window.open('http://www.facebook.com/share.php?u='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'twitter' ) {
				window.open('http://twitter.com/intent/tweet?status='+encodeURIComponent(data_url)+'+'+encodeURIComponent(data_title),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'google-plus' ) {
				window.open('https://plus.google.com/share?url='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			else if( data_action == 'linkedin' ) {
				window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(data_url)+'&title='+encodeURIComponent(data_title)+'&source='+encodeURIComponent(data_url),'sharer','toolbar=0,status=0,width=580,height=325');
			}
			
		});
	}
})(jQuery);
//For back to top and menu overlay
jQuery(document).ready(function($){
    var offset = 100;
    var speed = 250;
    var duration = 500;
	   $(window).scroll(function(){
            if ($(this).scrollTop() < offset) {
			     $('.button-top') .fadeOut(duration);
            } else {
			     $('.button-top') .fadeIn(duration);
            }
        });
	$('.button-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
		});
});
$(".navbar-toggle").on("click",function(){
$(".ownavigation").css("z-index","10000");
   setTimeout(function(){
                                
	if($("#navbar").hasClass("in")){
				   
					$("body").append("<div class='pp_overlay pp_overlay_new' style='opacity: 0.7; height: 4324px; width: 950px; display: block;'></div>");
					
					$(".pp_overlay_new").on("click",function(){

					$("#navbar").removeClass("in");
					$(".pp_overlay").remove();
					
	});                           
					
					
	}
	else{
					$(".pp_overlay").remove();
	}
  }, 500);

});
