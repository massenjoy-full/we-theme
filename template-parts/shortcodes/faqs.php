<?php
/**
 * Template: FAQs
 *
 * @package We
 */

$_posts    = $args['_posts'] ?? false;
$_title    = $args['_title'] ?? '';
$last_post = $_posts ? end( $_posts ) : 0;

?>

	<div class="faq">
		<div class="container">
			<h2 class="secondary-title"><?php echo esc_html( $_title ); ?></h2>
			<div class="accordion" id="faqAccordion">
				<?php if ( $_posts ) : ?>
					<?php foreach ( $_posts as $_post ) : ?>
						
						<div class="accordion-item">
							<div class="accordion-header" id="heading<?php echo esc_attr( $_post->ID ); ?>">
								<button class="accordion-button" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapse<?php echo esc_attr( $_post->ID ); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr( $_post->ID ); ?>">
									<?php echo esc_html( $_post->post_title ); ?>
								</button>
							</div>
							<div id="collapse<?php echo esc_attr( $_post->ID ); ?>" class="accordion-collapse collapse<?php echo ( $_post->ID === $last_post->ID ) ? ' show' : ''; ?>" aria-labelledby="heading<?php echo esc_attr( $post->ID ); ?>"
								data-bs-parent="#faqAccordion">
								<div class="accordion-body">
									<?php echo wp_kses_post( $_post->post_content ); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="faq-bg-element"></div>
	</div>
