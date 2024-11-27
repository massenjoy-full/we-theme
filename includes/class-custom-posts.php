<?php
/**
 * Custom Posts
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
 * Custom Posts
 */
class Custom_Posts {

	/**
	 * Singleton instance
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @var Init
	 */
	private static $instance = null;

	/**
	 * Get instance
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Init
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
		// Register FAQ post type.
		add_action( 'init', array( $this, 'register_post_type' ) );
	}

	/**
	 * Register post type.
	 *
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function register_post_type() {
		register_post_type(
			'faq',
			array(
				'labels'      => array(
					'name'                  => __( 'FAQs', 'we' ),
					'singular_name'         => __( 'FAQ', 'we' ),
					'add_new'               => __( 'Add New', 'we' ),
					'add_new_item'          => __( 'Add New FAQ', 'we' ),
					'edit_item'             => __( 'Edit FAQ', 'we' ),
					'new_item'              => __( 'New FAQ', 'we' ),
					'view_item'             => __( 'View FAQ', 'we' ),
					'search_items'          => __( 'Search FAQs', 'we' ),
					'not_found'             => __( 'No FAQs found', 'we' ),
					'not_found_in_trash'    => __( 'No FAQs found in Trash', 'we' ),
					'all_items'             => __( 'All FAQs', 'we' ),
					'archives'              => __( 'FAQ Archives', 'we' ),
					'insert_into_item'      => __( 'Insert into FAQ', 'we' ),
					'uploaded_to_this_item' => __( 'Uploaded to this FAQ', 'we' ),
				),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array(
					'slug' => 'faq',
				),
			)
		);
	}
}
