<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package We
 */

$is_front_page = is_front_page();

?>

	<?php if ( $is_front_page ) : ?>
		<footer class="footer">
			<div class="footer-content">
				<div class="container">
					<div class="d-flex flex-row justify-content-between align-items-center footer-text">
						<img src="<?php echo esc_url( WE_URI . '/assets/images/escultures.png' ); ?>" alt="escultures image" class="footer-image">
						<div class="p-2"></div>
						<div class="p-8">

							<div><?php echo wp_kses_post( _x( 'Thanks for visiting my website', 'Footer Front Page', 'we' ) ); ?></div>
							<div><?php echo wp_kses_post( _x( 'You can write to me on any of my social networks, I will answer you.', 'Footer Front Page', 'we' ) ); ?></div>
						</div>
						<div class="p-2"></div>
					</div>
					<div class="d-flex flex-row justify-content-between align-items-center footer-nav">
						<?php if ( has_custom_logo() ) : ?>
							<div class="logo"><?php the_custom_logo(); ?></div>
						<?php else : ?>
							<div class="logo"><?php bloginfo( 'name' ); ?></div>
						<?php endif; ?>
						<nav class="main-menu">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav>
						<nav class="main-menu menu-2">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu-2',
								)
							);
							?>
						</nav>
					</div>
				</div>
			</div>
			<div class="copyright"></div>
		</footer>
	<?php else : ?>
		<footer id="colophon" class="footer">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'we' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'we' ), 'WordPress' );
					?>
				</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
