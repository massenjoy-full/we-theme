<?php
/**
 * Helper
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
 * Helper
 */
class Helper {
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
	public function __construct() {}

	/**
	 * Retrieve all FAQs posts
	 *
	 * @param int $posts_per_page Number of posts to retrieve.
	 * @return array Array of post objects.
	 */
	public function get_faqs_posts( $posts_per_page = 5 ) {
		$faqs = get_posts(
			array(
				'post_type'      => 'faq',
				'posts_per_page' => $posts_per_page,
			)
		);

		return $faqs;
	}
}
