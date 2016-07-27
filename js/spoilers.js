(function($) {
	'use strict';

	function init() {
		$('.spoilers-button').each(function() {
			var $this = $(this),
				$parent = $this.parent(),
				showMsg = $parent.attr('data-showtext') || mw.msg('spoilers_show_default'),
				hideMsg = $parent.attr('data-hidetext') || mw.msg('spoilers_hide_default');
			$this
				.text($parent.children('.spolers-body:visible').length ? showMsg : hideMsg)
				.click(function() {
					$parent.children('.spoilers-button').text($parent.children('.spolers-body:visible').length ? hideMsg : showMsg);
					$parent.children('.spoilers-body').slideToggle();
				});
		});
	}

	$(init);
}(this.jQuery));
