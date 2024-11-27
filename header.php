<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package We
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'we' ); ?></a>

	<header class="header">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<?php if ( has_custom_logo() ) : ?>
					<div class="logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<div class="logo"><?php bloginfo( 'name' ); ?></div>
				<?php endif; ?>
				<div class="hamburger">
					<div id="hamburger-menu-toggler">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>

				<div id="menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_class'     => 'menu',
						),
					);
					?>
				</div>
			</div>
		</div>
	</header>
