(function($){     
	$.fn.extend({   

		ns: function(options) { 
		
			// Defaults
			var defaults = {
				transition		: 'scroll',
				scrollSpeed		: 500,
				slidePause		: 4000,
				indicators		: $('ul#billy_indicators'),
				indicatorLinks	: true,
				activeClass		: 'active',
				scrollAmount	: 'auto',
				nextLink		: $('#billy_next'),
				prevLink		: $('#billy_prev'),
				autoAnimate		: true,
				loop			: true,
				customIndicators: false,
				noAnimation		: false,
			};
			
			// Opzioni
			var options = $.extend(defaults, options);
			
			// Def
			var option;
			var object;
			var slides;
			var slidewidth;
			var slidecount;
			var currentslide;
			var defautindicator;
			var the_indicators;
			var hreftag;
			var indicatorsli;
			var currentindicator;
			
			// Loop Carousels
			return this.each(function() {
				
				// Set Options
				option = options;
				// Set currently selected
				object = $(this);
				// Sets up slide size
				slides = object.find('li');
				if (option.scrollAmount	== 'auto') { 
					slidewidth		= slides.width();
				}else{ 
					slidewidth = option.scrollAmount; 
				}
				// Other vars
				slidecount = (slides.width() * slides.length) / slidewidth;
				slidecount = Math.round(slidecount);
				currentslide = 0;
				
				// If there's slides, continue
				if (slides.length > 0) {
					
					// If the developer wants default indicators
					if (!option.customIndicators) {
						// Loop / no. of slides
						for (var i = 0; i<slidecount; i++) {
							// -- Insert Indicators
							if (!option.indicatorLinks) {
								option.indicators.append('<li></li>');
							}else{
								option.indicators.append('<li><a href="#'+i+'"></a></li>');
							}
						}
					}
	
					// Indicator Functionality
					defautindicator = option.indicators.find('li:eq(0)');
					defautindicator.addClass(option.activeClass)
					the_indicators = option.indicators.find('li a');
			
					// Thanks to Tomas Nikl for the below fix
					the_indicators.click( function() {
						hreftag = $(this).attr('href');
						hreftag = hreftag.substring(hreftag.search('#')+1, hreftag.length);
						jumptospecific(hreftag);
						if (option.autoAnimate) {
							clearInterval(period);
							period = window.setInterval(function() {
								if (currentslide >= (slidecount - 1)) {
									jumptostart();
								}else{
									jumpnext();
								}
							}, option.slidePause);
						}
						return false;
					});
					
					// -- Fading Properties
					if (option.transition == 'fade') {
						object.css({
							position: 'relative',
							margin: '0px'
						});
						object.find('li').css({
							position: 'absolute',
							top: '0px',
							left: '0px',
							display: 'none',
							zIndex: '999'
						});
						// Show First Slide
						object.find('li:eq(0)').css('display','block');
					}
			
					
					// -- Jump Functions
					
					// Jump to Start
					var jumptostart = function() {
					    currentslide = 0;
						if (option.noAnimation) {
							object.css('marginLeft', "0");
						}else{
							// Fade Transition
							if (option.transition == 'fade') {
								object.find('li').css('display','none');
								object.find('li:eq('+(currentslide)+')').css({
									display: 'block',
									zIndex: '990'
								});
								object.find('li:eq('+(slidecount-1)+')').css({
									display: 'block',
									zIndex: '999',
								});
								object.find('li:eq('+(slidecount-1)+')').fadeOut(option.scrollSpeed);
							}else{
								// Scroll Transition
								object.animate({'marginLeft': "0"}, option.scrollSpeed);
							}
						} 
						// Do Indicators
					    indicatorsli = option.indicators.find('li');
						indicatorsli.removeClass();
					   	currentindicator = option.indicators.find('li:eq('+(currentslide)+')');
						currentindicator.addClass(option.activeClass);
					};
					
					// Jump to End	
					var jumptoend = function() {
					    currentslide = slidecount-1;
						if (option.noAnimation) {
							object.css('marginLeft', "-"+(currentslide*slidewidth)+"px");
						}else{
							// Fade Transition
							if (option.transition == 'fade') {
								object.find('li').css('display','none');
								object.find('li:eq('+(currentslide)+')').css({
									display: 'block',
									zIndex: '990'
								});
								object.find('li:eq(0)').css({
									display: 'block',
									zIndex: '999',
								});
								object.find('li:eq(0)').fadeOut(option.scrollSpeed);
							}else{
								// Scroll Transition
					    		object.animate({'marginLeft': "-"+(currentslide*slidewidth)}, option.scrollSpeed);
							}
						}
					    indicatorsli = option.indicators.find('li')
						indicatorsli.removeClass();
					    currentindicator = option.indicators.find('li:eq('+(currentslide)+')');
						currentindicator.addClass(option.activeClass);
					};
					
					// Jump to Next Slide
					var jumpnext = function() {
						if (currentslide < (slidecount - 1)) {
							currentslide ++;
							if (option.noAnimation) {
								object.css('marginLeft', "-"+(slidewidth*currentslide)+"px");
							}else{
								// Fade Transition
								if (option.transition == 'fade') {
									object.find('li').css('display','none');
									object.find('li:eq('+(currentslide)+')').css({
										display: 'block',
										zIndex: '990'
									});
									object.find('li:eq('+(currentslide-1)+')').css({
										display: 'block',
										zIndex: '999',
									});
									object.find('li:eq('+(currentslide-1)+')').fadeOut(option.scrollSpeed);
								}else{
									// Scroll Transition
									object.animate({'marginLeft': "-"+(slidewidth*currentslide)}, option.scrollSpeed);
								}
							}
							indicatorsli = option.indicators.find('li');
							indicatorsli.removeClass();
							currentindicator = option.indicators.find('li:eq('+(currentslide)+')');
							currentindicator.addClass(option.activeClass);
							if (option.autoAnimate) {
								clearInterval(period);
								period = window.setInterval(function() {
									if (currentslide >= (slidecount - 1)) {
										jumptostart();
									}else{
										jumpnext();
									}
								}, option.slidePause);
							}
						}else{
							if (option.loop)
								jumptostart();
						}
					};
					
					// Jump to Prev Slide
					var jumpback = function() {
						if (currentslide > 0) {
							currentslide --;
							if (option.noAnimation) {
								object.css('marginLeft', "-"+(slidewidth*currentslide)+"px");
							}else{
								// Fade Transition
								if (option.transition == 'fade') {
									object.find('li').css('display','none');
									object.find('li:eq('+(currentslide)+')').css({
										display: 'block',
										zIndex: '990'
									});
									object.find('li:eq('+(currentslide+1)+')').css({
										display: 'block',
										zIndex: '999',
									});
									object.find('li:eq('+(currentslide+1)+')').fadeOut(option.scrollSpeed);
								}else{
									// Scroll Transition
									object.animate({'marginLeft': "-"+(slidewidth*currentslide)}, option.scrollSpeed);
								}
							}
							indicatorsli = option.indicators.find('li');
							indicatorsli.removeClass();
							currentindicator = option.indicators.find('li:eq('+(currentslide)+')');
							currentindicator.addClass(option.activeClass);
							if (option.autoAnimate) {
								clearInterval(period);
								period = window.setInterval(function() {
									if (currentslide >= (slidecount - 1)) {
										jumptostart();
									}else{
										jumpnext();
									}
								}, option.slidePause);
							}
						}else{
							if (option.loop)
								jumptoend();
						}
					};
					
					// Jump to Specific Slide
					var jumptospecific = function(frame) {
						if (currentslide !== frame) {
							currentslide = frame;
							if (option.noAnimation) {
								object.css('marginLeft', "-"+(slidewidth*currentslide)+"px");
							}else{
								// Fade Transition
								if (option.transition == 'fade') {
									object.find('li:eq('+currentslide+')').css({
										display: 'block',
										zIndex: '990'
									});
									object.find('li').not('li:eq('+currentslide+')').css({
										zIndex: '999'
									});
									object.find('li').not('li:eq('+currentslide+')').fadeOut(option.scrollSpeed);
								}else{
									// Scroll Transition
						    		object.animate({'marginLeft': "-"+(slidewidth*currentslide)}, option.scrollSpeed);
								}
							}
						    indicatorsli = option.indicators.find('li');
							indicatorsli.removeClass();
						    currentindicator = option.indicators.find('li:eq('+(currentslide)+')');
							currentindicator.addClass(option.activeClass);
						}
					};
					
					// -- Click next/prev
					option.nextLink.click( function() {
						jumpnext();
						return false;
					});
					option.prevLink.click( function() {
						jumpback();
						return false;
					});
					
					// -- Autoanimate
					if (option.autoAnimate) {
						// -- Periodical
						var period;
						// Run
						period = window.setInterval(function() {
				
							if (currentslide >= (slidecount - 1)) {
								jumptostart();
							}else{
								jumpnext();
							}
		
						}, option.slidePause);
					}
				}
				
			})
			
		}
		
	});
})(jQuery);