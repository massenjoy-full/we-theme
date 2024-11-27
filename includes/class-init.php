<?php
/**
 * Init
 *
 * @package We
 */

namespace We;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Init
 */
class Init {
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
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'after_setup_theme', array( $this, 'set_content_width' ), 0 );
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Register custom posts.
		Custom_Posts::get_instance();

		// Register shortcodes.
		Shortcodes::get_instance();
	}

	/**
	 * Theme setup.
	 *
	 * @version 1.0.0
	 */
	public function setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'we', get_template_directory() . '/languages' );

		// Add default RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Register a single navigation menu.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'we' ),
			)
		);

		// Switch core markup to valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'we_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	/**
	 * Set the content width in pixels.
	 *
	 * @version 1.0.0
	 */
	public function set_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'we_content_width', 640 );
	}

	/**
	 * Register widget area.
	 *
	 * @version 1.0.0
	 */
	public function register_widgets() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'we' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'we' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @version 1.0.0
	 */
	public function enqueue_scripts() {
		// Enqueue the main stylesheet.
		wp_enqueue_style( 'we-style', WE_STYLESHEET_URI, array(), wp_get_theme()->get( 'Version' ) );

		// Enqueue navigation script.
		wp_enqueue_script( 'we-navigation', WE_URI . '/assets/js/navigation.js', array(), wp_get_theme()->get( 'Version' ), true );

		// Enqueue the main stylesheet.
		wp_enqueue_style( 'we-bootstrap', WE_URI . '/assets/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ) );

		// Enqueue navigation script.
		wp_enqueue_script( 'we-bootstrap', WE_URI . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

		// Enqueue main script based on WP_DEBUG status.
		$script_suffix = WP_DEBUG ? '' : '.min';
		wp_enqueue_script( 'we-script', WE_URI . "/assets/js/main{$script_suffix}.js", array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

		// Enqueue additional stylesheet based on WP_DEBUG status.
		$style_suffix = WP_DEBUG ? '' : '.min';
		wp_enqueue_style( 'we-additional-style', WE_URI . "/assets/css/style{$style_suffix}.css", array(), wp_get_theme()->get( 'Version' ) );

		// Enqueue comment-reply script for single posts with open comments.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
