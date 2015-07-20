function Spoilers($) {
	'use strict';

	this.init = function() {
		$('.spoilers-button').on('click', spoiler.reveal);
	};

	var spoiler = {
		reveal: function() {
			$(this).parents('.spoilers').find('.spoilers-body').toggle();
			$(this).children().toggle();
		}
	}
}

var SE = new Spoilers(jQuery);
jQuery(document).ready(SE.init);