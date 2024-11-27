<?php
/**
 * Template: Hero
 *
 * @package We
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$_title     = $args['_title'] ?? '';
$_content   = $args['_content'] ?? '';
$_direction = $args['_direction'] ?? '';

?>
<div class="hero hero-image">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center flex-column gap-40">
			<?php echo do_shortcode( '[we_social_links]' ); ?>
			<?php if ( ! empty( $_title ) ) : ?>
				<h1 class="main-title"><?php echo wp_kses_post( $_title ); ?></h1>
			<?php endif; ?>
			<?php if ( ! empty( $_direction ) ) : ?>
				<img src="<?php echo esc_url( $_direction ); ?>" alt="direction-icon" class="margin-35">
			<?php endif; ?>
		</div>
	</div>
</div>
