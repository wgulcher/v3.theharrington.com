jQuery(document).ready(function($){
		
	/* Settings ============================================================================================= */
	
	var post_sizes = {
		spans: {
			large_span: 'span6',
			medium_span: 'span4',
			small_span: 'span4',
			thumbnail_span: 'span4',
			large_image_only_span: 'span4',
			medium_image_only_span: 'span2',
			small_image_only_span: 'span1',
			thumbnail_image_only_span: 'span1'
		},
		expand: {
			height: '540',
			height_instagram: '620',
			span: 'span12'
		},
		hover: {
			large_width: '310', //large
			large_height: '310', //large
			medium_width: '220', //medium
			medium_height: '220', //medium
			small_width: '140', //small
			small_height: '140', //small
			thumb_width: '105', //thumb
			thumb_height: '105', //thumb
			span: 'span3'
		}
	};
	
	var other_params = {
		hover: {
			easingType: 'easeOutBack', 
			durationLength: 250,
			start_top: 5,
			start_left: 20,
			thumb_end_top: 40,
			thumb_end_left: 17.5,
			small_end_top: 35,
			small_end_left: 20,
			medium_end_top: 35,
			medium_end_left: 20,
			large_end_top: 0,
			large_end_left: 15,
		}
	};

	var settings = {
		postSpans : post_sizes.spans,
		expandedSize : post_sizes.expand,
		hoverSize    : post_sizes.hover,
		hoverParams    : other_params.hover,
	};
	
	
	
	
	
	/* SIDEBAR -------------------------------- */

var DEFAULT_ANIM_SPEED = 520;
var DEFAULT_ANIM_EASE = "easeOut";

var SIDEBAR_IS_OPEN = false;
var SIDEBAR_HINT_WIDTH = 5;
var SIDEBAR_OPEN_WIDTH = 330;
var SIDEBAR_CLOSED_PADDING = 0;
var SIDEBAR = $('.sidebar-animated');
var SIDEBAR_BUTTON = $('#sidebarButton');




	
	
	
	SIDEBAR_BUTTON.css( {cursor:'pointer'} );

	SIDEBAR_BUTTON.click(
		function() {			
			
			if ( !SIDEBAR_IS_OPEN ) {
				openSIDEBAR();
			} else {
				closeSIDEBAR();
			}
			
			
		}
	);
	
	
	initSIDEBAR();
	closeSIDEBAR();
	hintSIDEBAR();
	
	//openSIDEBAR();
	//closeSIDEBAR();





function initSIDEBAR() {
	SIDEBAR.css( {width: SIDEBAR_OPEN_WIDTH, right: -(SIDEBAR_OPEN_WIDTH+SIDEBAR_CLOSED_PADDING)} );
	
}

function hintSIDEBAR() {
	SIDEBAR.animate( {right:SIDEBAR_HINT_WIDTH - SIDEBAR_OPEN_WIDTH}, DEFAULT_ANIM_SPEED );
	SIDEBAR_IS_OPEN = false;
}

function openSIDEBAR() {
	SIDEBAR.animate( {right:0}, DEFAULT_ANIM_SPEED );
	SIDEBAR_IS_OPEN = true;
}

function closeSIDEBAR() {
	SIDEBAR.animate( {right:-(SIDEBAR_OPEN_WIDTH+SIDEBAR_CLOSED_PADDING)}, DEFAULT_ANIM_SPEED );
	SIDEBAR_IS_OPEN = false;
}





	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* UI Elements (Buttons, click events etc) ========================================================================================== */
	
	/* filters --------------------------- */

	$('.filter-radio').click(function(){
		var showOnly = $(this).val();
		$('.hentry').each(function(){
			if (!$(this).hasClass(showOnly)) {
				$(this).hide().addClass('hidden');
			} else {
				$(this).show().removeClass('hidden');
			}
		});
	});
	
	$('.filter-checkbox').change(function(){
		var showOnly = $(this).val();
		$('.hentry').each(function(){
			if (!$(this).hasClass(showOnly)) {
				$(this).hide().addClass('hidden');
			} else {
				$(this).show().removeClass('hidden');
			}
		});
	});
	
	$('.filter-dropdown').change(function(){
		var showOnly = $(this).val();
		$('.hentry').each(function(){
			if (!$(this).hasClass(showOnly)) {
				$(this).hide().addClass('hidden');
			} else {
				$(this).show().removeClass('hidden');
			}
		});
	});
	
	/* Clear cache in HTML5 -------------------------- */
	$('.clear-settings').click(function( e ) {
		e.preventDefault();
		userSettings.clear();
		location.reload();
	});
	
	/* Show/hide post box ----------------------------- */
	$('.add-post-now').click(function(){
		$('.insert-posts-menu .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
		return false;
	});
	$('.insert-posts-menu .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');

	/* submit on dropdown change -------------------------- */
	$('.standard-dropdown').change(function(){
		if ($(this).val() !== 0) {
			console.log($(this).val());
			$(this).parent().submit();
		}
	});

	/* toggle tag cloud ----------------------------------- */
	$('.tagCloudButton').click(function(e){
		e.preventDefault();
			closeSIDEBAR();
		$('.tag-cloud').stop().slideToggle(300, 'easeOutQuad');
	});
	
	/* all button clicks - used in groups - todo - use for everything */
	$('.btn').click(function(e){
		e.preventDefault();
		//var active = $('.set-interaction-type[class*="active"]').val();
		var clicked = $(this).val();
		setRunSiteSetting(clicked);
	});
	
	// post click events  ---------------------------------------------------- */
		$('.post-feed').on('click', '.hentry', function(e){
			e.preventDefault();
				closeSIDEBAR();
				
					//alert('click');
				
			if (settings.expand) {
				
				//alert('EXPAND');
		
				
				
				if ( $(this).hasClass('hentry-shrink-trigger') ){
					expander.close();
						
			applyMasonry('.post-feed-wrap','.hentry');	
			
				} else {
							
					$('.post-feed-wrap').masonry( 'destroy' );
			
			
					expander.open($(this));
				}
			}
			
			else if (settings.flip) {
				flipContent(this);
			}
			
			else if (settings.reveal) {
				revealFromPosts(this);
			}
			
			else{
				
				$selectedItem = $(this);
				newUrl = $selectedItem.attr('wp2js_permalink');
				//alert(newUrl);
				window.location = newUrl;				
			}
		});
		
		
		
		$('.post-feed .article-popup-container').on('click', '#viewpost_button', function(e){
			e.preventDefault();
				closeSIDEBAR();
			
				
				$selectedItem = $('.post-feed .article-popup-container .hentry');
				newUrl = $selectedItem.attr('wp2js_permalink');
				//alert(newUrl);
				window.location = newUrl;				
			
		});
		

	// key press ----------------------------------------------------
	$(document).keydown(function(e) {
		// ESCAPE key
		if (e.keyCode == 27) {
			if ($('body').hasClass('view-mode--expanded')){
				expander.close();
			}
		}
	});
	
	
	/* Interactions ======================================================================================== */
	
	/* hover ------------------------------------------------- */

	function onHoverOn($entry){
		
		
		$body.addClass('view-mode--hovered');
		position = $entry.position();
		$duplicatedContainer = $('.article-popup-container');
		$duplicatedContainer.data('original-position', position);
		$duplicatedContainer.empty().append($entry.clone()).show();
		$duplicatedItem = $duplicatedContainer.find('.hentry');
		$duplicatedItem.find('.post-thumb-wrap').removeClass('post-thumb-wrap').addClass('post-thumb-wrap-hovered'); 
		
		if ( $('body').hasClass('layout-size--thumbnail')){
			hoverSettings = { start_top: position.top+settings.hoverParams.start_top, start_left: position.left +settings.hoverParams.start_left, end_top: position.top-settings.hoverParams.thumb_end_top, end_left: position.left -settings.hoverParams.thumb_end_left};
			endWidth = settings.hoverSize.thumb_width;
			endHeight = settings.hoverSize.thumb_height;
		}else if ( $('body').hasClass('layout-size--small')){
			hoverSettings = { start_top: position.top+settings.hoverParams.start_top, start_left: position.left +settings.hoverParams.start_left, end_top: position.top-settings.hoverParams.small_end_top, end_left: position.left -settings.hoverParams.small_end_left};
			endWidth = settings.hoverSize.small_width;
			endHeight = settings.hoverSize.small_height;
		}else if ( $('body').hasClass('layout-size--medium')){
			hoverSettings = { start_top: position.top+settings.hoverParams.start_top, start_left: position.left +settings.hoverParams.start_left, end_top: position.top-settings.hoverParams.medium_end_top, end_left: position.left -settings.hoverParams.medium_end_left};
			endWidth = settings.hoverSize.medium_width;
			endHeight = settings.hoverSize.medium_height;
		}else if ( $('body').hasClass('layout-size--large')){
			hoverSettings = { start_top: position.top+settings.hoverParams.start_top, start_left: position.left +settings.hoverParams.start_left, end_top: position.top-settings.hoverParams.large_end_top, end_left: position.left +settings.hoverParams.large_end_left};
			endWidth = settings.hoverSize.large_width;
			endHeight = settings.hoverSize.large_height;
		}
		
		startCoord = { top: hoverSettings.start_top, left: hoverSettings.start_left};
		endCoord = { top: hoverSettings.end_top, left: hoverSettings.end_left };
		
		$duplicatedContainer.css({top: startCoord.top, left: startCoord.left });
 		$duplicatedContainer.stop().animate({ 
			top: endCoord.top, 
			left: endCoord.left }, 
			 {
				easing: settings.hoverParams.easingType,
				duration: settings.hoverParams.durationLength
			});
		$duplicatedItem.animate({ 
			width: endWidth,
			height: endHeight}, 
			 {
			   	easing: settings.hoverParams.easingType,
				duration: settings.hoverParams.durationLength
			}, 	
			
		function(){	
			$duplicatedItem.removeClass('span2').
			addClass(settings.hoverSize.span).css('width', '');
		});
		$duplicatedItem.find('.meta-info').show();
	}

	function onHoverOff($entry){
		//alert("onHoverOff");
		if (!settings.expand){
			$body.removeClass('view-mode--hovered');
			$duplicatedContainer.empty();
		}
		
	}

	/* expand -------------------------------------------------------- */
	
	function animationCompleteCallback($entry){
		if($entry){expander.open($entry);}
	}
	
	function shiftContentForExpand($selected, closeOnly){
		
		
		
		
		$selected = $selected || null;
		var shiftAnimation = {
			//style: 'easeOutCirc',
			style: 'easeOutBack',
			timing: 600
		};
		
		$('.article-popup-spacer').slideUp(300, 'easeOutQuad', function(){
			$('.article-popup-spacer').remove();
			animationCompleteCallback($selected);
		});
		$('.hentry').show();

		if (closeOnly === true){
			return false;
		}
		
		var columnWidth;
		if ( $('body').hasClass('layout-size--thumbnail') && $('.post-feed').hasClass('post-feed-layout-visual') ){
			columnWidth = 51;
		}else if ( $('body').hasClass('layout-size--small')  && $('.post-feed').hasClass('post-feed-layout-visual') ){
			columnWidth = 80;
		}else if ( $('body').hasClass('layout-size--medium')  && $('.post-feed').hasClass('post-feed-layout-visual') ){
			columnWidth = 160;
		}else if ( $('body').hasClass('layout-size--large')  && $('.post-feed').hasClass('post-feed-layout-visual') ){
			columnWidth = 320;
		}else if ( $('body').hasClass('layout-size--large')){
			
			/* @richardmax - todo: get this working for all data modes when large as col width varies */
			columnWidth = 640; // large
		}else{
			columnWidth = 320;
		}
		
	
		//alert(columnWidth);
		
				
		
		var contentWidth = $('.main-content-wrap').width();
		
		//alert(contentWidth);
		
		var totalColumns = Math.floor(contentWidth / columnWidth);
		
		//alert(totalColumns);	
			
		
		// todo - find out why the param below wsnt pixel perfect - stopped it all working - added .ceil to fix
		selectedPositionLeft = Math.ceil ($selected.position().left);
		
		
		// what a hack dude - sorted the shit re ceil above - all seems stable unt
		if(selectedPositionLeft < 159 ){selectedPositionLeft = 0;}
		else if(selectedPositionLeft < 319 ){selectedPositionLeft = 160;}
		else if(selectedPositionLeft < 479 ){selectedPositionLeft = 320;}
		else if(selectedPositionLeft < 639 ){selectedPositionLeft = 480;}
		else if(selectedPositionLeft < 799 ){selectedPositionLeft = 640;}
		else if(selectedPositionLeft < 959 ){selectedPositionLeft = 800;}
		else if(selectedPositionLeft < 1119 ){selectedPositionLeft = 960;}
		else if(selectedPositionLeft < 1279 ){selectedPositionLeft = 1120;}
		else if(selectedPositionLeft < 1439 ){selectedPositionLeft = 1280;}
		else if(selectedPositionLeft < 1599 ){selectedPositionLeft = 1440;}
		else if(selectedPositionLeft < 1759 ){selectedPositionLeft = 1600;}
		else if(selectedPositionLeft < 1919 ){selectedPositionLeft = 1760;}
		else if(selectedPositionLeft < 2079 ){selectedPositionLeft = 1920;}
		else if(selectedPositionLeft < 2239 ){selectedPositionLeft = 2080;}
		else if(selectedPositionLeft < 2399 ){selectedPositionLeft = 2240;}
		else if(selectedPositionLeft < 2559 ){selectedPositionLeft = 2400;}
		else if(selectedPositionLeft < 2719 ){selectedPositionLeft = 2560;}
		else if(selectedPositionLeft < 2879 ){selectedPositionLeft = 2720;}
		else if(selectedPositionLeft < 3039 ){selectedPositionLeft = 2880;}
		else{selectedPositionLeft = 3040;}
		
	//	alert( selectedPositionLeft );	
			
		
		var selectedItemColumn = (selectedPositionLeft / columnWidth) + 1;
		
		
		var rowsFirstItem = ( $selected.index() ) - ( selectedItemColumn - 1 );
		$selected.hide();
		
		
		// custom sizes dependant on content type
		if ( $('hentry').hasClass('tag-instagram') && $('.post-feed').hasClass('post-feed-layout-visual') ){
			expandedHeight = settings.expandedSize.height_spotify;
		}else{
			expandedHeight = settings.expandedSize.height;
		}
	
		
		$($('.post-feed-wrap > .hentry')[rowsFirstItem]).before('<div class="article-popup-spacer span12" />');
		$('.article-popup-spacer')
			.css({
				'width': '100%',
				'height': expandedHeight
			})
			
			//scroll down if expanding would go out of view 
			.slideDown(shiftAnimation.timing, shiftAnimation.style, function(){
				$duplicatedContainer = $('.article-popup-container');
				posBottom = $duplicatedContainer.offset().top + $duplicatedContainer.height();
				viewPosition = $(window).height() + $('body').scrollTop();
				if (posBottom > viewPosition) {
					offset = ( $('body').scrollTop() ) + (posBottom - viewPosition);
					$('body').animate({
						scrollTop: offset + 20
					});
				}
			});
	}

	var expander = function($this){
		
		// custom sizes dependant on content type
		if ( $('hentry').hasClass('tag-instagram') && $('.post-feed').hasClass('post-feed-layout-visual') ){
			expandedHeight = settings.expandedSize.height_spotify;
		}else{
			expandedHeight = settings.expandedSize.height;
		}
				
					
		
		$duplicatedContainer = $('.article-popup-container');
		$body = $('body');

		var open = function($entry){
			
			$entry = $entry.closest('.hentry');
			p = $entry.position();
			
			if ($body.hasClass('view-mode--expanded')) {
				close($entry);
			} else {
				$duplicatedContainer.data('original-position', p);
				$duplicatedContainer.empty().append($entry.clone()).show();
				$duplicatedContainer.find('.hentry').addClass('row').removeClass('span1');
				$duplicatedContainer.find('.hentry').addClass('hentry-shrink-trigger')
				$duplicatedContainer.find('.hentry-wrap').addClass('hentry-wrap-expanded');
				$duplicatedContainer.find('.post-thumb-wrap').addClass('post-thumb-wrap-expanded').addClass('span6');
				$duplicatedContainer.find('.post-thumb-wrap').removeClass('post-thumb-wrap');
				$duplicatedContainer.find('.hentry-text').addClass('span6').addClass('offset6');
				$body.addClass('view-mode--expanded');
				$duplicatedContainer.css({top: p.top, left: p.left, width: '100%'  });
				$duplicatedItem = $duplicatedContainer.find('.hentry');
				$duplicatedContainer.animate({ left: 0 });
				
				
					
				$duplicatedItem.animate({
						width: '100%',
						height: expandedHeight,//settings.expandedSize.height,
					},{	
						easing: 'easeOutQuad',
						complete:  function() { 
							$duplicatedItem
								.removeClass('span1 span2 span3 span4 span5 span6 span12')
								.addClass('span12')
								.css('width', '');			
						}
					},
					
					function(){
						$duplicatedItem
							.addClass(settings.expandedSize.span)
							.addClass('hentry-expanded');
							if ( $(body).hasClass('layout-size--thumbnail') ){
								$duplicatedItem
									.removeClass('span1');
							}
					}
				);
				shiftContentForExpand($entry, false);
			}
		};
			
		var close = function($selected){
			$duplicatedContainer.empty();
			$body.removeClass('view-mode--expanded');
			shiftContentForExpand($selected, true);
		};

		return {
			open : open,
			close : close
		};
	}();


	/* flip ----------------------------------------------------- */
	
	function flipContent(clickedItem){
		event.preventDefault();
		var $parent = $(clickedItem).closest('.hentry');
		var $article = $parent.find('.post-thumb-wrap');
		var $flip = $parent.find('.content-flip');
		var $flips = $('.content-flip').not($flip);
		var active_class = 'is_active';

		articleVisible = $article.is(':visible');
		$parent.fadeOut('fast', function(){
			if (articleVisible){
				$article.hide();
				$flip.show();
			} else {
				$flip.hide();
				$article.show();
			}
			$parent.fadeIn();
		});
	};

	/* reveal ----------------------------------------------------- */
	
	
	$('.btn-removeReveal').click(function(e){
		e.preventDefault();
		removeReveal();
		//alert('here');
	});
	
	function removeReveal(){
		//alert('here');
		$footer2show = $('.footer');
		$footer2show.removeClass('fx-type--hide');
		
		$posts2show = $('.main-content-wrap');
		$posts2show.removeClass('fx-type--hide');
		
		
		
		$content2hide = $('.reveal');
		$content2hide.addClass('moveoffstage');
	}
	
	function revealFromPosts(clickedItem){
		
	
		event.preventDefault();
		//alert('reeveal from posts');
			
		$selectedItem = $(clickedItem);
		slideRefNumber = $selectedItem.attr('wp2js_postnumber') - 1;
		
		
		$footer2show = $('.footer');
		$footer2show.addClass('fx-type--hide');		//alert(newUrl);
			
		
		$posts2hide = $('.main-content-wrap');
		$posts2hide.addClass('fx-type--hide');
		
		$content2show = $('.reveal');
		$content2show.removeClass('moveoffstage');
		
		jump2SlideUrl = '#/' + slideRefNumber;
		
		if(slideRefNumber != 0){
			window.location = jump2SlideUrl;
		}
		
		
		
		//todo as better than below - try using progress bar so can jump to right slide without leaving page....
		// must be a jump to slide param for reveal -USE IT!!!!!!!!!!!
							
		
		
		
				//newUrl = $selectedItem.attr('wp2js_permalink');
				//alert(newUrl);
				
		
		
		
	};
	
	
	/* Geo Data ============================================================================================ */
	
	/* geo post data --------------------------------------------- */
	function get_geo_posts() {
		$.ajax({
			url: WP.adminAjax,
			dataType: 'json',
			data: {
				'action': 'get_geo_posts'
			},
			success:function(data, response) {
				// console.log(response);
				// console.log(data);
				get_map(data);
			},
			error:function(data, response){
				// console.log(response);
				// console.log(data);
			}
		});
	}
	get_geo_posts();

	/* posts on a map ---------------------------------------- */
	function get_map(data) {
		if (typeof google !== 'undefined') {
			if (!data){
				data = {
					locations: {},
					center_lat: 51.504714,
					center_lon: -0.120825,
					map_options: {
						zoom: 10
					}
				};
			}

			var post_map = new GMapper({
				container: 'post-map',
				locations: data.locations,
				center: {
					lat: data.center_lat,
					lon: data.center_lon
				},
				map_options: {
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: true,
					panControl: true,
					panControlOptions: {
						position: google.maps.ControlPosition.TOP_RIGHT
					},
					streetViewControl: false,
					zoomControl: true,
					scaleControl: true,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.LARGE,
					position: google.maps.ControlPosition.TOP_LEFT
				},
					zoom: data.map_options.zoom
					// maxZoom: 7
				}
			});
			post_map.init();
		} else {
			console.warn('Google Maps is not available (var google = undefined)');
		}
	}
	// get_map();


	/* Todo :: Delete if not needed ======================================================================== */
		
	/* hero toggle / video ------------------------------------------------- */
	$('#toggleHero').on('click', function(){
		$header = $('.article-header');
		$headerImg = $header.find('.hero-image');
		$headerVid = $header.find('#test-vid');

		$headerImg.toggle();
		$headerVid.toggle();
		if ($header.find('#test-vid').length === 0){
			$header.append('<iframe id="test-vid" class="hero hero-video" src="http://player.vimeo.com/video/42326051?title=0&amp;byline=0&amp;portrait=0&amp;color=ee3124&amp;api=1" width="940" height="540" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
		}
	});
	
	/* ajax pageviews ------------------------------------------------------------- */
	function add_pageview() {
		$.ajax({
			url: WP.adminAjax,
			dataType: 'json',
			data: {
				'action': 'add_pageview',
				'post_id': WP.postId
			},
			success:function(data, response) {
				// console.log(response);
				// console.log(data);
			},
			error:function(data, response) {
				// console.log(response);
				// console.log(data);
			}
		});
	}

	if (WP.postId !== null) {
		add_pageview();
	}


	/* Controls - todo ======================================================================================== */
	
	/* post-feed ---------------------- */
	$('.toggle-post-feed').click(function(e){									
		e.preventDefault();
		saveAssetState( 'on' , 'postfeed' );
		$('.post-feed .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
		return false;
	});
	
	/* filters view----------------------------------- */
	$('.toggle-filter-view-button').click(function(e){									
		e.preventDefault();
		saveAssetState( 'on' , 'filters_view' );
		
		
		$('.filter-menu-view .fx-type--toggle').stop().slideToggle('normal', function(){
																			   
																			   
				if ($('.filter-menu-view .fx-type--toggle').is(':hidden')) {
					
					
					$('.toggle-filter-view-button').removeClass('active');
				}else{
					setActiveButtonState('toggle-filter-view');
				}
				
			
		});
		
		
		return false;
		
		
		
		
	});
	
	/* filters query----------------------------------- */
	$('.toggle-filter-query-button').click(function(e){									
		e.preventDefault();
		saveAssetState( 'on' , 'filters_query' );
		
		$('.filter-menu-query').css({'margin-top': '10px'});
		
		$('.filter-menu-query .fx-type--toggle').stop().slideToggle('normal', function(){
																			   
																				   
				if ($('.filter-menu-query .fx-type--toggle').is(':hidden')) {
					
					$('.filter-menu-query').css({'margin-top': '0px'});	
					$('.toggle-filter-query-button').removeClass('active');
				}else{
					setActiveButtonState('toggle-filter-query');
					//$('.filter-menu-query').css({'margin-top': '15px'});	
				}
				
			
		});
		
		
		
		return false;
	});
	
	/* options menu page --------------------------------------- */
	
	
	
	
	$('.toggle-menu-page-button').click(function(e){
		e.preventDefault();
		
	//	$('.menu-page').stop().slideToggle(400, 'easeOutQuad');
		
		
	//$('.page_options').css({'height': ''});
	//$('.menu-page').css({'margin-bottom': '10px'});	// works well
	
	
		
		$('.menu-page .fx-type--toggle').stop().slideToggle(1, function(){
																			   
																			   
				if ($('.menu-page .fx-type--toggle').is(':hidden')) {
					//$('.page_options').css({'height': '0px'});	
					/*$('.menu-page').css({'margin-bottom': '0px'});*/
					userSettings.remove('layout_page');
					$('.toggle-menu-page-button').removeClass('active');
				}else{
					saveAssetState( 'on' , 'layout_page' );
					setActiveButtonState('toggle-menu-page');
					/*$('.menu-page').css({'margin-bottom': '20px'});*/
				}
				
			
		});
		
		
		
		
		return false;
	});
	
	/* options menu site --------------------------------------- */
	$('.toggle-menu-site-button').click(function(e){
		e.preventDefault();
		
		
		//$('.menu-site').css({'margin-bottom': '10px'});
		
		
		
		
		$('.menu-site .fx-type--toggle').stop().slideToggle('normal', function(){
																			   
																			   
				if ($('.menu-site .fx-type--toggle').is(':hidden')) {
					//$('.filter-menu-query').css({'margin-top': '10px'});
		
					$('.menu-site').css({'margin-bottom': '10px'});	
					userSettings.remove('layout_site');
					$('.toggle-menu-site-button').removeClass('active');
				}else{
					//$('.filter-menu-query').css({'margin-top': '15px'});
		$('.menu-site').css({'margin-bottom': '20px'});
					saveAssetState( 'on' , 'layout_site' );
					setActiveButtonState('toggle-menu-site');
					
				}
				
			
		});
		
	
		return false;
	});
	


	/* navigation menu --------------------------------------------- */
	$('.toggle-navigation-button').click(function(e){
		e.preventDefault();
		toggleNav();
		
		return false;
	});	
	
	
	
	function toggleNav( firstRun ) {
		
		//$('.navbar').css({'margin-top': '10px'});
		//$('.navbar').css({'margin-bottom': '15px'});
		
		$('.navbar .fx-type--toggle').stop().slideToggle('normal', function(){
																			   
				if ($('.navbar .fx-type--toggle').is(':hidden')) {
					//$('.navbar').css({'margin-top': '0px'});	
					//$('.navbar').css({'margin-bottom': '0px'});
					userSettings.remove('navigation');
					$('.toggle-navigation-button').removeClass('active')
				}else{
					saveAssetState( 'on' , 'navigation' );
					setActiveButtonState('toggle-navigation'); 
				}
				
		});
		
	}
		
		
		
		
		
	
	
	
	/* image-fit ----------------------------------------- */
	
	
	
	function imageFit( imageFitMode ) {
		
		
		if ( imageFitMode == "contain" ) {
		$('.hentry')
			.removeClass('image-fit-cover')
			.addClass('image-fit-contain');
			userSettings.set('imageFit', 'contain')
			//userSettings.set('imageFit', 'cover')
		} else {
		$('.hentry')
			.removeClass('image-fit-contain')
			.addClass('image-fit-cover');
			userSettings.set('imageFit', 'cover')
		}
		
		
		
	}
	
	
	/* galleryItem-height --------------------------- */
	
	$('.toggle-galleryItem-height').click(function(e){
		e.preventDefault();
			galleryItemRestrictedHeight( 'on' );
			applyMasonry('.gallery','.gallery-item');	
			
	});
	
	
	
	
	/* masonry gallery --------------------------- */
	
	$('.flexiheight-button-gallery').click(function(e){
		e.preventDefault();
			
			applyMasonry('.gallery','.gallery-item');	
	})
	
	
	/* Functions - Done ==================================================================================== */
	
	/* hover ------------------------------------- */
		function startHoverMode(){
			
			
		//	if ( $('body').hasClass('layout-size--thumbnail') && $('.post-feed').hasClass('post-feed-layout-visual') ){
			
				$('.hentry').hover( function(){
					if (settings.hover && $('.post-feed').hasClass('post-feed-layout-visual') && $('body').hasClass('hover-enabled-on') ){
						onHoverOn($(this));
					}						 
				 },null );
				$('.article-popup-container').hover( null,function(){onHoverOff($(this));} );

		}
		
	/* layoutSize --------------------------------------------------- */
	
	function switchLayoutSize( layoutSize ) {
		
		$container = $('#container');
		$activitystream = $('.post-feed');
		
		var span;
		if ( $activitystream.hasClass('post-feed-layout-visual') ){
			if ( layoutSize === 'large' ) {
				span = settings.postSpans.large_image_only_span;
			} else if ( layoutSize === 'small' ) {
				span = settings.postSpans.small_image_only_span;
			} else if ( layoutSize === 'thumbnail' ) {
				span = settings.postSpans.thumbnail_image_only_span;
			} else {
				span = settings.postSpans.medium_image_only_span;
			}
		}else{
			if ( layoutSize === 'large' ) {
				span = settings.postSpans.large_span;
			} else if ( layoutSize === 'small' ) {
				span = settings.postSpans.small_span;
			} else if ( layoutSize === 'thumbnail' ) {
				span = settings.postSpans.thumbnail_span;
			} else {
				span = settings.postSpans.medium_span;
			}
		}

		$body
			.removeClass(function (index, css) {
				return (css.match (/\blayout-size-\S+/g) || []).join(' ');
			})
			.addClass('layout-size--' + layoutSize);
			
		$container
			.removeClass(function (index, css) {
				return (css.match (/\blayout-size-\S+/g) || []).join(' ');
			})
			.addClass('layout-size--' + layoutSize);
		
		if ( $body.hasClass('layout-type--fixed') ) {
			$('.post-feed .hentry')
				.removeClass('span1 span2 span3 span4 span5 span6')
				.addClass(span);
				
				
			$('.post-feed .hentry-no-results')
				.removeClass('span1 span2 span3 span4 span5 span6');
				
		}
		userSettings.set( 'layoutSize', layoutSize );
	}
	
	
	/* layoutFormat-------------------------------------------- */
	
	function switchLayoutFormat( layoutFormat ) {
		
		$('.hentry').removeClass('hentry-layout-visual hentry-layout-data').addClass( 'hentry-layout-' + layoutFormat );
		$('.post-feed').removeClass('post-feed-layout-visual post-feed-layout-data').addClass( 'post-feed-layout-' + layoutFormat );
		userSettings.set('layout_format', layoutFormat)
	
		$activitystream = $('.post-feed');
		
		var span;
		if ( $activitystream.hasClass('post-feed-layout-visual') ){
			if ( $body.hasClass('layout-size--large') ) {
				span = settings.postSpans.large_image_only_span;
			} else if ( $body.hasClass('layout-size--medium') ) {
				span = settings.postSpans.medium_image_only_span;
			} else if ( $body.hasClass('layout-size--small') ) {
				span = settings.postSpans.small_image_only_span;
			} else if ( $body.hasClass('layout-size--thumbnail') ) {
				span = settings.postSpans.thumbnail_image_only_span;
			} else {
				span = settings.postSpans.medium_image-only_span;
			}
		}else{
			if ( $body.hasClass('layout-size--large') ) {
				span = settings.postSpans.large_span;
			} else if ( $body.hasClass('layout-size--medium') ) {
				span = settings.postSpans.medium_span;
			} else if ( $body.hasClass('layout-size--small') ) {
				span = settings.postSpans.small_span;
			} else if ( $body.hasClass('layout-size--thumbnail') ) {
				span = settings.postSpans.thumbnail_span;
			} else {
				span = settings.postSpans.medium_span;
			}
		}

		if ( $body.hasClass('layout-type--fixed') ){
			$('.post-feed .hentry')
				.removeClass('span1 span2 span3 span4 span5 span6')
				.addClass(span);
				
				
				
			$('.post-feed .hentry-no-results')
				.removeClass('span1 span2 span3 span4 span5 span6');
				
				
		}
		
	}
	
	/* image-shape ----------------------------- */

	function imageShape( shape ) {
		
		//alert(shape);
		
		$('.post-feed').removeClass('post-feed-image-shape-square post-feed-image-shape-rectangle post-feed-image-shape-circle post-feed-image-shape-various').addClass( 'post-feed-image-shape-' + shape );
		$('.hentry-wrap').removeClass('image-shape-square image-shape-rectangle image-shape-circle image-shape-various').addClass( 'image-shape-' + shape );
		userSettings.set('shape', shape)
	}
	
		/* type ------------------------------ */

	function switchLayoutType( type ) {
		
		//alert(type)
		
		$body = $('body');
		$container = $('#container');
		$activitystream = $('.content .post-feed');
		
		var container_class, row_class;
		if (type === 'fluid') {
			container_class = 'container-fluid';
			row_class = '';
		} else {
			container_class = 'container';
			row_class = 'row';
		}
		
		var span;
		if ( $activitystream.hasClass('post-feed-layout-visual') ){
			if ( $body.hasClass('layout-size--large') ) {
				span = settings.postSpans.large_image_only_span;
			} else if ( $body.hasClass('layout-size--medium') ) {
				span = settings.postSpans.medium_image_only_span;
			} else if ( $body.hasClass('layout-size--small') ) {
				span = settings.postSpans.small_image_only_span;
			} else if ( $body.hasClass('layout-size--thumbnail') ) {
				span = settings.postSpans.thumbnail_image_only_span;
			} else {
				span = settings.postSpans.medium_image-only_span;
			}
		}else{
			if ( $body.hasClass('layout-size--large') ) {
				span = settings.postSpans.large_span;
			} else if ( $body.hasClass('layout-size--medium') ) {
				span = settings.postSpans.medium_span;
			} else if ( $body.hasClass('layout-size--small') ) {
				span = settings.postSpans.small_span;
			} else if ( $body.hasClass('layout-size--thumbnail') ) {
				span = settings.postSpans.thumbnail_span;
			} else {
				span = settings.postSpans.medium_span;
			}
		}

		$body
			.removeClass(function (index, css) {
				return (css.match (/\blayout-type-\S+/g) || []).join(' ');
			})
			.addClass('layout-type--' + type);
			
		$container
			.removeClass('container container-fluid')
			.addClass(container_class);
			
		$container
			.removeClass(function (index, css) {
				return (css.match (/\blayout-type-\S+/g) || []).join(' ');
			})
			.addClass('layout-type--' + type);
			
		$activitystream
			.removeClass('row')
			.addClass(row_class);
			
		if ( type === 'fixed' ) {
			$('.post-feed .hentry')
				.removeClass('span1 span2 span3 span4 span5 span6')
				.addClass(span);
				
		
			
		}
		
			$('.post-feed .hentry-no-results')
				.removeClass('span1 span2 span3 span4 span5 span6');
				
				
						
	}
	
	
	/* skin --------------------------------------------- */
	
	function switchSkin( skin ) {
		
		
		userSettings.set( 'skin', skin );
			//alert(clicked);
			settings.skin = skin;
		
		if ( skin == 'light' ) {
			
			
			
			
			$('body').removeClass(function (index, css) {
				return (css.match (/\bskin-\S+/g) || []).join(' ');
			});
			
			$('body').addClass( 'skin-' + skin );
			
			
			$('.icon-search').each(function(){ 
				$(this).removeClass('icon-white');
			});
			
			$('i').each(function(){ 
				$(this).removeClass('icon-white');
			});
			
			$('a.btn').each(function(){ 
				$(this).removeClass('btn-dark');
			});
			
			$('.navbar .nav>li>a').each(function(){ 
				$(this).removeClass('btn-dark');
			});
			
			
		
			
			
			$('select').each(function(){ 
				$(this).removeClass('btn-dark');
			});
			
			$('input').each(function(){ 
				$(this).removeClass('btn-dark');
			});
			
			$('button').each(function(){ 
				$(this).removeClass('btn-dark');
			});
			$('.add-on').each(function(){ 
				$(this).removeClass('btn-dark add-on-dark');
			});
			
			
		} else {
			$('body').addClass( 'skin-' + skin );
			
			$('.icon-search').each(function(){ 
				$(this).addClass('icon-white');
			});
			
			$('i').each(function(){ 
				$(this).addClass('icon-white');
			});
			
			$('a.btn').each(function(){ 
				$(this).addClass('btn-dark');
			});
			$('.navbar .nav>li>a').each(function(){ 
				$(this).addClass('btn-dark');
			});
			
			
			$('select').each(function(){  
				$(this).addClass('btn-dark');
			});
			
			$('input').each(function(){  
				$(this).addClass('btn-dark');
			});
			
			$('button').each(function(){  
				$(this).addClass('btn-dark');
			});
			
			$('.add-on').each(function(){  
				$(this).addClass('btn-dark add-on-dark');
			});
			
			
		}
		
	
	}
	
	/* button states ----------------------------------------------------------------------- */
	
	window.setActiveButtonState = function(activeButtonRef){
		var buttonClassName = '.' + activeButtonRef + '-button';
		$(buttonClassName).addClass( 'active' );
	}
	
	window.setRunSiteSetting = function(clicked){
		
		
		
		$body = $('body');
		if ( $body.hasClass('view-mode--expanded') ){
			expander.close();
		}
		
		// interactionType-buttons ---------------------------------------------------------- //
		
		// default
		if(clicked == 'default'){
			userSettings.set('defaultclick', 'on');
			settings.defaultclick = true;
		}else if(clicked == 'hover' || clicked == 'expand' || clicked == 'flip' || clicked == 'reveal'){
			userSettings.remove('defaultclick');
			settings.defaultclick = false;
		}
		//expand
		if(clicked == 'expand'){
			$('body').addClass( 'expand-enabled-on' );
			userSettings.set('expand', 'on');
			settings.expand = true;		
			
		//	alert('expad is true');
			
			
				if (settings.expand) {//alert('expad is true!!!!');
				}else{
					// alert('expad is false');
				}
			
		}else if(clicked == 'default' || clicked == 'hover' || clicked == 'flip'  || clicked == 'reveal'){
			$('body').removeClass(function (index, css) {
				return (css.match (/\bexpand-enabled-\S+/g) || []).join(' ');
			});
			userSettings.remove('expand');
			settings.expand = false;
			
				//alert('expad is false');
				
			expander.close();
		}
		// hover
		if(clicked == 'hover'){
			$('body').addClass( 'hover-enabled-on' );	
			userSettings.set('hover', 'on');
			settings.hover = true;
		}else if(clicked == 'default' || clicked == 'expand' || clicked == 'flip'  || clicked == 'reveal'){
			userSettings.remove('hover');
			settings.hover = false;
		}
		// flip
		if(clicked == 'flip'){
			userSettings.set('flip', 'on');
			settings.flip = true;
		}else if(clicked == 'default' || clicked == 'expand' || clicked == 'hover'  || clicked == 'reveal'){
			userSettings.remove('flip');
			settings.flip = false;
		}
		
		// 3d
		if(clicked == 'reveal'){
			userSettings.set('reveal', 'on');
			settings.reveal = true;
		}else if(clicked == 'default' || clicked == 'expand' || clicked == 'hover'  || clicked == 'flip' ){
			userSettings.remove('reveal');
			settings.reveal = false;
		}
		
		// sizes ---------------------------------------------------------- //
		if(clicked == 'thumbnail' || clicked == 'small' || clicked == 'medium' || clicked == 'large'){
			userSettings.set( 'layoutSize', clicked );
			settings.layoutSize = clicked;
			switchLayoutSize(clicked);
			
			if(settings.layoutFormat != 'data'){
				if(clicked == 'thumbnail'){
					currentColumnWidth = 30;
				}
				if(clicked == 'small'){
					currentColumnWidth = 60;
				}
				if(clicked == 'medium'){
					currentColumnWidth = 140;
				}
				if(clicked == 'large'){
					currentColumnWidth = 140;
				}
			}
			
			applyMasonry('.post-feed-wrap','.hentry');	
			
			
			
		}
		
		// shape ---------------------------------------------------------- //
		if(clicked == 'square' || clicked == 'rectangle' || clicked == 'circle' || clicked == 'various' ){
			userSettings.set( 'shape', clicked );
			settings.shape = clicked;
			imageShape( clicked );
			
			
			
		
				applyMasonry('.post-feed-wrap','.hentry');	
			
			
			//alert(clicked);
		}
		
		// image / data  ---------------------------------------------------------- //
		if(clicked == 'visual' || clicked == 'data'){
				
			if(clicked == 'data'){
				currentColumnWidth = 140;
			}else{
				if(settings.layoutSize == 'thumbnail'){
					currentColumnWidth = 30;
				}
				if(settings.layoutSize == 'small'){
					currentColumnWidth = 60;
				}
				if(settings.layoutSize == 'medium'){
					currentColumnWidth = 140;
				}
				if(settings.layoutSize == 'large'){
					currentColumnWidth = 140;
				}
			}
			
			userSettings.set( 'layout_format', clicked );
			settings.layoutFormat = clicked;
			switchLayoutFormat( clicked );
			
			applyMasonry('.post-feed-wrap','.hentry');
		
		}
			
		// imageFit  ---------------------------------------------------------- //
		if(clicked == 'contain' || clicked == 'cover'){
			userSettings.set( 'imageFit', clicked );
			settings.imageFit = clicked;
			
			imageFit(clicked);	
			//alert(clicked);
		}
		
		// fixed / fluid  ---------------------------------------------------------- //
		if(clicked == 'fixed' || clicked == 'fluid'){
			userSettings.set( 'layout_type', clicked );
			settings.layoutType = clicked;
			switchLayoutType( clicked );
			//alert(clicked);
		}
		
		// light / dark  ---------------------------------------------------------- //
		if(clicked == 'light' || clicked == 'dark'){
			
			switchSkin( clicked );
			
		}
		
		// grid ----------------------------------------------------------------
		
		if(clicked == 'grid'){
			//userSettings.set( 'grid', 'on' );
			//settings.grid = 'on';
			toggleGrid( 'on' );
			//alert(clicked);
		}
		
		
		
	
		
		
	}
	
	
	/* Functions - Todo ==================================================================================== */
				
				
				
	/* isotope -------------------------------------------------  */
	


	 //var currentColumnWidth;
	 	
	/* masonry -----------------------*/
	
	 window.applyMasonry = function(container,item2Apply) {
		  
		//  alert (currentColumnWidth);
		
					//alert('111');
				
				
				//return;
		
		
		if ($('body').hasClass('view-mode--expanded')){
			// do nothing
			//alert('here ric')
			
			}else{
			
			
			
				
	
	var masonryColWidth2Use;

			if ($('body').hasClass('expand-enabled-on') || $('body').hasClass('single')){
			
				
				
				
			
				masonryColWidth2Use = 20

			

				
			
			} else
	
		 
	   	   
	   	//	alert(container + ',' + item2Apply);
			
			
			
			
		 	masonryColWidth2Use = 20;
		 
		 
	
		
	
	  
	  
	  
	  
	  
	  	$(function(){
				   
				   
				   		//	alert('yyy');
											 
			
			
		   var $container = $(container);
		 
		   $container.imagesLoaded( function(){
											 
		//	alert('xxx');
											 
			 $container.masonry({
				columnWidth: 20,
				gutter: 20,
				itemSelector: item2Apply
			 });
		   });
		  
		  
		 
		 });
	  
			
			
			
		}
		
	  	 
	  }
			
	
	/* SAVES THE STATE OF A SINGLE BUTTON - TRY TO REMOVE OR ADD TO LATEST LOGIC */
	function saveAssetState( state, asset ) {
		if(localStorage.getItem( asset ) == state ){
			userSettings.remove( asset );
		}else{
			userSettings.set( asset , 'on');
		}
	}
	

	function galleryItemRestrictedHeight( restricted ) {
		var isOn = $('.hentry').hasClass('galleryItem-restricted-height-' + restricted) ? true : false;
		if ( isOn ) {
			$('.hentry').removeClass(function (index, css) {
				return (css.match (/\bgalleryItem-restricted-height-\S+/g) || []).join(' ');
			});
			userSettings.remove('restricted');
		} else {
			$('.hentry').addClass( 'galleryItem-restricted-height-' + restricted );
			userSettings.set('restricted', 'on')
		}		
	}
	
	/* grid -------------------------------- */
	$('.grid-button').click(function(e){
		e.preventDefault();
		setRunSiteSetting('grid');
	});
	
	function toggleGrid( grid ) {
		var isOn = $('body').hasClass('grid-' + grid) ? true : false;
		if ( isOn ) {
			$('body').removeClass(function (index, css) {
				return (css.match (/\bgrid-\S+/g) || []).join(' ');
			});
			userSettings.remove('grid');
		} else {

			$('body').addClass( 'grid-' + grid );
			userSettings.set('grid', 'on')
		}
	}
	
	
	/* launch site ------------------------------------------------------- */
	window.launchSite = function(){
		//imageOnly( 'on' );
		//imageFit( 'on' );
		//switchLayoutType( 'fixed' );
		//galleryItemRestrictedHeight('on');
		
		
		$('.wrapper-main').removeClass('fx-type--hide');
		$('.article').removeClass('fx-type--hide');
		$('.post-feed').removeClass('fx-type--hide');
		$('.reveal-feed').removeClass('fx-type--hide');
		$('.widget-area-header').removeClass('fx-type--hide');
		//$('.menu-menu').removeClass('fx-type--hide');
		$('.insert-posts-menu').removeClass('fx-type--hide');
		$('.nav-primary').removeClass('fx-type--hide');
		//$('.menu-site').removeClass('fx-type--hide');
		$('.menu-page').removeClass('fx-type--hide');
		$('.filter-menu-view').removeClass('fx-type--hide');
		$('.filter-menu-query').removeClass('fx-type--hide');
		$('.reveal-menu-transitions').removeClass('fx-type--hide');
		$('.reveal-menu-themes').removeClass('fx-type--hide');
		
		
		if(!userSettings.get('expand') && !userSettings.get('hover') && !userSettings.get('flip') && !userSettings.get('reveal') && !userSettings.get('defaultclick')){
			setActiveButtonState('default');
			setRunSiteSetting('default');
		}
		
		if(!userSettings.get('layoutSize')){
			setActiveButtonState('medium');
		}
		
		if(!userSettings.get('shape')){
			setActiveButtonState('square');
			
			setRunSiteSetting('square');
		}
		
		if(!userSettings.get('layout_format')){
			setActiveButtonState('data');
			setRunSiteSetting('data');
		}
		
		
		if(!userSettings.get('layout_type')){
			setActiveButtonState('fixed');
			setRunSiteSetting('fixed');
		}
		
		
		if(!userSettings.get('navigation')){
			//alert('xxx');
			saveAssetState( 'on' , 'navigation' );
			setActiveButtonState('toggle-navigation'); 
		}
		
		if(!userSettings.get('imageFit')){
			//alert('xxx');
			setActiveButtonState('cover');
			setRunSiteSetting('cover');
		}
		


		
				
				
		
		startHoverMode(); // different so triggered here as is hover not click like others
		
		
		
	}
	
	
	/* store ------------------------------------------------------------------------------------------------------------------------- */
	
	window.initilizeUserSettings = function(){
		userSettings.init();
	}
	
	
	
	
	var userSettings = function( key, value ) {
		if ( localStorage ) {			
			var get = function( key ) {
				return localStorage.getItem( key );
			};
			var set = function( key, value ) {
				localStorage.setItem( key, value );
			};
			var remove = function( key ) {
				localStorage.removeItem( key );
			}
			var init = function (  ) {
			
				// sizes ------------------------------------------------------ //
				layoutSize = get('layoutSize');
				
				if ( layoutSize ) {
					setActiveButtonState(layoutSize);
					setRunSiteSetting(layoutSize);
				}
				
				// interactionTypes ------------------------------------------------------ //
				defaultclick = get('defaultclick');
				expand = get('expand');
				hover = get('hover');
				flip = get('flip');
				reveal = get('reveal');
				
				if ( defaultclick ) {
					setActiveButtonState('default');
					setRunSiteSetting('default');
				}
				
				if ( expand ) {
					setActiveButtonState('expand');
					setRunSiteSetting('expand');
				}
				
				if ( hover ) {
					setActiveButtonState('hover');
					setRunSiteSetting('hover');
				}
				
				if ( flip ) {
					setActiveButtonState('flip');
					setRunSiteSetting('flip');
				}
				
				if ( reveal ) {
					setActiveButtonState('reveal');
					setRunSiteSetting('reveal');
				}
				
				// layoutFormat ------------------------------------------------------ //
				
				layoutFormat = get('layout_format');
				
				if ( layoutFormat ) {
					setActiveButtonState(layoutFormat);
					setRunSiteSetting(layoutFormat);
				}
				
				
				// layoutType ------------------------------------------------------ //
				
				layoutType = get('layout_type');
				
				if ( layoutType ) {
					setActiveButtonState(layoutType);
					setRunSiteSetting(layoutType);
				}
				
				
				// shape ------------------------------------------------------------ //
				
				shape = get('shape');
				
				if ( shape ) {
					setActiveButtonState(shape);
					setRunSiteSetting(shape);
				}
				
				
				// shape ------------------------------------------------------------ //
				imgfit = get('imageFit');
				
				if ( imgfit ) {
					setActiveButtonState(imgfit);
					setRunSiteSetting(imgfit);
				}
				
				// skin ------------------------------------------------------------ //
				
				skin = get('skin');
				
				if ( skin ) {
					setActiveButtonState(skin);
					setRunSiteSetting(skin);
					
					
				}else{
					setActiveButtonState('light');
				}
				
				
				
				// latest - todo
				
				
				grid = get('grid');
				
				if ( grid ) {
					setActiveButtonState('grid');
					setRunSiteSetting('grid');
					//alert(grid);
				}
				
				
				filters_view = get('filters_view'); 
				
				if ( filters_view ) {
					
					setRunSiteSetting(filters_view);
				}else{
					setActiveButtonState('toggle-filter-view');
				}
				
				
				
				filters_query = get('filters_query');
				
				if ( filters_query ) {
					
					setRunSiteSetting(filters_query);
				}else{
					setActiveButtonState('toggle-filter-query');
				
				}
				
				layout_site = get('layout_site'); 
				
				if ( layout_site ) {
					setActiveButtonState('toggle-menu-site');
					setRunSiteSetting(layout_site);
				}
				
				layout_page = get('layout_page'); 
				
				if ( layout_page ) {
					
					setRunSiteSetting(layout_page);
					setActiveButtonState('toggle-menu-page');

				}
				
				navigation = get('navigation'); 
				
				if ( !navigation ) {
					$('.navbar .fx-type--toggle').css({'display': 'none'});
					//toggleNav();	
				}else{
					setActiveButtonState('toggle-navigation');
				}
				
				/*if ( !navigation) {
				
						
				
					
				}
				
				*/
				
				
				
				
				
				restricted = get('restricted');
				if ( restricted ) {
					galleryItemRestrictedHeight(restricted);
				}
				
				postfeed = get('postfeed'); 
				if ( postfeed) {
					$('.post-feed .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
				}
				
				if ( !filters_view) {
					
					//$('.filter-menu-view .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');

					$('.filter-menu-view .fx-type--toggle').css({'display': 'none'});

					$('.toggle-filter-view-button').removeClass('active');
					

				}else{

						$('.toggle-filter-view-button').addClass('active');

				}
				
				
				//@richardmax - shows filters by default
				/*
				if ( !filters_query) {
					//$('.filter-menu-query .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');

					$('.filter-menu-query .fx-type--toggle').css({'display': 'none'});

					$('.toggle-filter-query-button').removeClass('active');
					
					
					
				}else{

						$('.toggle-filter-query-button').addClass('active');

				}
				
				*/
				
				
				if ( !layout_site) {

					$('.menu-site .fx-type--toggle').css({'display': 'none'});
	$('.menu-site').css({'margin-bottom': '10px'});	

					//alert("111");

					//$('.menu-site .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
						
					//$('.site_options').css({'height': ''});
					//$('.menu-site').css({'margin-bottom': '10px'});	
					/*

					$('.menu-site .fx-type--toggle').stop().slideToggle('normal', function(){															
							if ($('.menu-site .fx-type--toggle').is(':hidden')) {
								//$('.site_options').css({'height': '0px'});	
								//$('.menu-site').css({'margin-bottom': '0px'});	
							//	userSettings.remove('layout_site');
							}else{
							//	saveAssetState( 'on' , 'layout_site' );
							}
					});	

*/
				}
				
				
				
				
				
				
				
				if ( !layout_page) {
					
					
						//$('.menu-page .fx-type--toggle').css({'display': 'none'});
					/*
					$('.menu-page').css({'margin-bottom': '0px'});*/
					
						//$('.page_options').css({'height': ''});
						//$('.menu-page').css({'margin-bottom': '10px'});	// works well
						
						
						/*
						$('.menu-page .fx-type--toggle').stop().slideToggle(1, function(){
																							   
																							  
																							   
								if ($('.menu-page .fx-type--toggle').is(':hidden')) {
									//$('.page_options').css({'height': '0px'});	
									
									//$('.menu-page').css({'margin-bottom': '0px'});	
								//	userSettings.remove('layout_site');
								}else{
								//	saveAssetState( 'on' , 'layout_site' );
								}
								
								
						});

*/
						
				}
				
				/*
				reveal = get('reveal');
				if ( reveal) {
					$('.reveal-menu-transitions .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
					$('.reveal-menu-themes .fx-type--toggle').stop().slideToggle(300, 'easeOutQuad');
				}
				*/
				
			};

			var clear = function (  ) {
				localStorage.clear();
			};

			return {
				get: get,
				set: set,
				remove: remove,
				init: init,
				clear: clear
			}

		} else {
			return false;
		}
	}();
	
	//initilizeUserSettings();

		
		//launchSite();
 
				
		

});