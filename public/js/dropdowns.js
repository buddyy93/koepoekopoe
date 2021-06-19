(function($){
	$.fn.dropdowns = function (options) {
		
		var defaults = {
			toggleWidth: 768
		}
		
		var options = $.extend(defaults, options);
		
		var ww = document.body.clientWidth;
		
		var addParents = function() {
			$(".nav_dropdowns li a").each(function() {
				if ($(this).next().length > 0) {
					$(this).addClass("parent");
				}
			});
		}
		
		var adjustMenu = function() {
			if (ww < options.toggleWidth) {
				$(".toggleMenu").css("display", "inline-block");
				if (!$(".toggleMenu").hasClass("active")) {
					$(".nav_dropdowns").hide();
				} else {
					$(".nav_dropdowns").show();
				}
				$(".nav_dropdowns li").unbind('mouseenter mouseleave');
				$(".nav_dropdowns li a.parent").unbind('click').bind('click', function(e) {
					// must be attached to anchor element to prevent bubbling
					e.preventDefault();
					$(this).parent("li").toggleClass("hover");
				});
			} 
			else if (ww >= options.toggleWidth) {
				$(".toggleMenu").css("display", "none");
				$(".nav_dropdowns").show();
				$(".nav_dropdowns li").removeClass("hover");
				$(".nav_dropdowns li a").unbind('click');
				$(".nav_dropdowns li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
					// must be attached to li so that mouseleave is not triggered when hover over submenu
					$(this).toggleClass('hover');
				});
			}
		}
		
		return this.each(function() {
			$(".toggleMenu").click(function(e) {
				e.preventDefault();
				$(this).toggleClass("active");
				$(this).next(".nav_dropdowns").toggle();
				adjustMenu();
			});
			adjustMenu();
			addParents();
			$(window).bind('resize orientationchange', function() {
				ww = document.body.clientWidth;
				adjustMenu();
			});
		});
	
	}
})(jQuery)