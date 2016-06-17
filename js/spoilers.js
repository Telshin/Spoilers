(function($) {
	'use strict';

	function init() {
		$('.spoilers-button').each(function(i,elem){
			var $elem   = $(elem),
			    $parent = $elem.parent(),
			    showMsg = $parent.attr('data-showtext') || mw.msg('spoilers_show_default'),
			    hideMsg = $parent.attr('data-hidetext') || mw.msg('spoilers_hide_default');
			$elem.text(showMsg);
			$elem.click(function(){
				$parent.children('.spoilers-button').text($parent.children('.spolers-body:visible').length ? hideMsg : showMsg);
				$parent.children('.spoilers-body').slideToggle();
			});
		});
	}

	$(init);
}(this.jQuery));
