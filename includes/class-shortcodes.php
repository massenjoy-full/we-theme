<?php
/**
 * Shortcodes
 *
 * @version 1.0.0
 * @since 1.0.0
 *
 * @package We
 */

namespace We;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Shortcodes
 */
class Shortcodes {

	/**
	 * Singleton instance
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @var Shortcodes
	 */
	private static $instance = null;

	/**
	 * Get instance
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Shortcodes
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor to set up hooks.
	 *
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function __construct() {
		add_shortcode( 'we_faqs', array( $this, 'faq_html' ) );
		add_shortcode( 'we_hero', array( $this, 'hero_html' ) );
		add_shortcode( 'we_social_links', array( $this, 'social_links_html' ) );
	}

	/**
	 * FAQ shortcode
	 *
	 * @version 1.0.0
	 * @since 1.0.0
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	public function faq_html( $atts ) {
		$atts = shortcode_atts(
			array(
				'category' => '',
			),
			$atts
		);

		$_posts = Helper::get_instance()->get_faqs_posts();
		$_title = __( 'PREGUNTAS FRECUENTES', 'we' );

		ob_start();
		get_template_part(
			'template-parts/shortcodes/faqs',
			null,
			array(
				'_posts' => $_posts,
				'_title' => $_title,
			)
		);
		return ob_get_clean();
	}

	/**
	 * Hero shortcode
	 *
	 * @version 1.0.0
	 * @since 1.0.0
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	public function hero_html( $atts ) {
		$atts = shortcode_atts(
			array(
				'title'     => _x( 'We Love Salud', 'Home page hero title', 'we' ),
				'content'   => '',
				'direction' => WE_URI . '/assets/images/direction.svg',
			),
			$atts
		);

		ob_start();
		get_template_part(
			'template-parts/shortcodes/hero',
			null,
			array(
				'_title'     => $atts['title'],
				'_content'   => $atts['content'],
				'_direction' => $atts['direction'],
			)
		);
		return ob_get_clean();
	}

	/**
	 * Social links shortcode
	 *
	 * @version 1.0.0
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function social_links_html() {
		ob_start();

		get_template_part(
			'template-parts/shortcodes/social-links',
		);

		return ob_get_clean();
	}
}
