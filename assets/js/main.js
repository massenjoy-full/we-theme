jQuery(function ($) {
	const $menuToggler = $('#hamburger-menu-toggler');
	const $menu = $('#menu');

	$menuToggler.on('click', function (e) {
		e.stopPropagation();
		$(this).toggleClass('open');
		$menu.toggleClass('open');
	});

	$(document).on('click', function (e) {
		if (!$menu.is(e.target) && $menu.has(e.target).length === 0) {
			$menu.removeClass('open');
			$menuToggler.removeClass('open');
		}
	});
});

