(function($) {
	
	function media_upload( button_class) {
		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;
		$('body').on('click',button_class, function() {
			var button_id ='#'+$(this).attr('id');
			/* console.log(button_id); */
			var self = $(button_id);
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $(button_id);
			var id = button.attr('id').replace('_button', '');
			_custom_media = true;
			wp.media.editor.send.attachment = function(props, attachment){
				if ( _custom_media  ) {
				   $('.custom_media_id').val(attachment.id); 
				   $('.custom_media_url').val(attachment.url);
					   $('.custom_media_image').attr('src',attachment.url).css('display','block');   
				} else {
					return _orig_send_attachment.apply( button_id, [props, attachment] );
				}
			}
			wp.media.editor.open(button);
			return false;
		});
	}
	
	/* Event - Document Ready */
	$(document).on("ready",function() {

		$( "#redux_save" ).before(function() {
			return '<i class="fa fa-save"></i>';
 		});

		$( "#redux-defaults-section" ).before(function() {
			return '<i class="fa fa-undo"></i>';
 		});

		$( "#redux-defaults" ).before(function() {
			return '<i class="fa fa-refresh"></i>';
 		});

		$( "#redux-footer-sticky #redux_save" ).before(function() {
			return '<i class="fa fa-save"></i>';
 		});

		$( "#redux-footer-sticky #redux-defaults-section" ).before(function() {
			return '<i class="fa fa-undo"></i>';
 		});

		$( "#redux-footer-sticky #redux-defaults" ).before(function() {
			return '<i class="fa fa-refresh"></i>';
 		});	
		
		/* - Add Anchor link for button */
		$(".redux-action_bar").each(function() {
			$(this).find(".fa-save,#redux_save").wrapAll('<a class="control_button save" title="Save Changes"></a>');
			$(this).find(".fa-undo,#redux-defaults-section").wrapAll('<a class="control_button reset" title="Reset Section"></a>');
			$(this).find(".fa-refresh,#redux-defaults").wrapAll('<a class="control_button resetall" title="Reset All"></a>');
		});
		
		/* Disable : Page Editor */
		if( $('body.post-type-page #postdivrich').length && $('select#page_template').length ) {

			/* Sidebar Layout */
			if( $('select#page_template').val() != 'default' ) {
				$('body.post-type-page #postdivrich').slideUp(500);
			}

			$('select#page_template').live('change', function() {

				/* Sidebar Layout */
				if( $('select#page_template').val() != 'default' ) {
					$('body.post-type-page #postdivrich').slideUp(500);
				}
				else {
					$('body.post-type-page #postdivrich').slideDown(500);
					$(window).scrollTop($(window).scrollTop()+1);
				}

			});
		}

		/* Post : Formats */
		if( $('#post-formats-select').length ) {

			if( $('input[id="post-format-video"]').is(':checked') ) {
				$('#healthkare_cf_metabox_post_video').slideDown(500); /* Enable Video */
				$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-quote"]').is(':checked') ) {
				$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-gallery"]').is(':checked') ) {
				$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#healthkare_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
				$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
			else if( $('input[id="post-format-audio"]').is(':checked') ) {
				$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#healthkare_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
			}
			else {
				$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
				$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
				$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
			}
 
			/* On Change : Event */
			$('#post-formats-select').live('change', function() {

				var highlight_css = '"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"';
				
				if( $('input[id="post-format-video"]').is(':checked') ) {
					$('#healthkare_cf_metabox_post_video').slideDown(500); /* Enable Video */
					$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */

					$("#healthkare_cf_metabox_post_video").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#healthkare_cf_metabox_post_video").offset().top }, 'slow' );
				}
				else if( $('input[id="post-format-audio"]').is(':checked') ) {
					$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#healthkare_cf_metabox_post_audio').slideDown(500); /* Enable Audio */
				
					$("#healthkare_cf_metabox_post_audio").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#healthkare_cf_metabox_post_audio").offset().top }, 'slow' );
				}
				else if( $('input[id="post-format-quote"]').is(':checked') ) {
					$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
				else if( $('input[id="post-format-gallery"]').is(':checked') ) {
					$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#healthkare_cf_metabox_post_gallery').slideDown(500); /* Enable Gallery */
					$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */

					$("#healthkare_cf_metabox_post_gallery").css({"border":"2px solid green", "-webkit-transition":"all 0.3s ease 0s", "-moz-transition":"all 0.3s ease 0s", "-o-transition":"all 0.3s ease 0s", "-ms-transition":"all 0.3s ease 0s", "transition":"all 0.3s ease 0s"});
					$('html, body').animate({ scrollTop: $("#healthkare_cf_metabox_post_gallery").offset().top }, 'slow' );
				} 
				else {
					$('#healthkare_cf_metabox_post_video').slideUp(500); /* Disable Video */
					$('#healthkare_cf_metabox_post_gallery').slideUp(500); /* Disable Gallery */
					$('#healthkare_cf_metabox_post_audio').slideUp(500); /* Disable Audio */
				}
			});
		}

		/* Post : Video */
		if( $('#healthkare_cf_post_video_source').val() == 'video_link' ) {
			$('.cmb2-id-healthkare-cf-post-video-link').slideDown(500); /* Enable Video Link */
			$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#healthkare_cf_post_video_source').val() == 'video_embed_code' ) {
			$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-healthkare-cf-post-video-embed').slideDown(500); /* Enable Embed */
			$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}
		else if ( $('#healthkare_cf_post_video_source').val() == 'video_upload_local' ) {
			$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-healthkare-cf-post-video-local').slideDown(500); /* Enable Video Local */
		}
		else {
			$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500); /* Disable Video Link */
			$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500); /* Disable Embed */
			$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500); /* Disable Video Local */
		}

		/* On Change : Event */
		$('#healthkare_cf_post_video_source').live('change', function() {

			if( $('#healthkare_cf_post_video_source').val() == 'video_link' ) {
				$('.cmb2-id-healthkare-cf-post-video-link').slideDown(500); /* Enable Video Link */
				$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#healthkare_cf_post_video_source').val() == 'video_embed_code' ) {
				$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-healthkare-cf-post-video-embed').slideDown(500); /* Enable Embed */
				$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500); /* Disable Video Local */
			}
			else if ( $('#healthkare_cf_post_video_source').val() == 'video_upload_local' ) {
				$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500); /* Disable Video Link */
				$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500); /* Disable Embed */
				$('.cmb2-id-healthkare-cf-post-video-local').slideDown(500); /* Enable Video Local */
			}
			else {
				$('.cmb2-id-healthkare-cf-post-video-link').slideUp(500);
				$('.cmb2-id-healthkare-cf-post-video-embed').slideUp(500);
				$('.cmb2-id-healthkare-cf-post-video-local').slideUp(500);
			}
		});

		/* Post : Audio */
		if( $('#healthkare_cf_post_audio_source').val() == 'soundcloud_link' ) {
			$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
			$('.cmb2-id-healthkare-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}
		else if ( $('#healthkare_cf_post_audio_source').val() == 'audio_upload_local' ) {
			$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-healthkare-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
		}
		else {
			$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
			$('.cmb2-id-healthkare-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
		}

		/* On Change : Event */
		$('#healthkare_cf_post_audio_source').live('change', function() {
			if( $('#healthkare_cf_post_audio_source').val() == 'soundcloud_link' ) {
				$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideDown(500); /* Enable Soundcloud URL */
				$('.cmb2-id-healthkare-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
			else if ( $('#healthkare_cf_post_audio_source').val() == 'audio_upload_local' ) {
				$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-healthkare-cf-post-audio-local').slideDown(500); /* Disable Audio Local */
			}
			else {
				$('.cmb2-id-healthkare-cf-post-soundcloud-url').slideUp(500); /* Enable Soundcloud URL */
				$('.cmb2-id-healthkare-cf-post-audio-local').slideUp(500); /* Disable Audio Local */
			}
		});
		
		/* Page : Metabox */
		if( $('#healthkare_cf_metabox_page').length ) {

			/* Header Background Color */
			if( $('select#healthkare_cf_page_title').val() != 'enable' ) {
				$('.cmb2-id-healthkare-cf-banner-desc').slideUp(500);
				$('.cmb2-id-healthkare-cf-page-header-img').slideUp(500);
			}

			$('#healthkare_cf_page_title').live('change', function() {

				/* Header Background Image */
				if( $('select#healthkare_cf_page_title').val() == 'disable' ) {
					$('.cmb2-id-healthkare-cf-banner-desc').slideUp(500);
					$('.cmb2-id-healthkare-cf-page-header-img').slideUp(500);
				}
				else {
					$('.cmb2-id-healthkare-cf-banner-desc').slideDown(500);
					$('.cmb2-id-healthkare-cf-page-header-img').slideDown(500);
				}
			});

			/* Sidebar Layout - Page */
			if( $('select#healthkare_cf_sidebar_layout').val() == 'no_sidebar' ) {
				$('.cmb2-id-healthkare-cf-widget-area').slideUp(500);
			}

			$('select#healthkare_cf_sidebar_layout').live('change', function() {

				/* Sidebar Layout - Page */
				if( $('select#healthkare_cf_sidebar_layout').val() == 'no_sidebar' ) {
					$('.cmb2-id-healthkare-cf-widget-area').slideUp(500);
				}
				else {
					$('.cmb2-id-healthkare-cf-widget-area').slideDown(500);
				}

			});
		}
		media_upload( '.custom_media_upload');
	});
})(jQuery);