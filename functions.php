<?php

/* THEME SETUP
------------------------------------------------ */

if ( ! function_exists( 'davis_setup' ) ) :

	function davis_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 620;
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-image', 620, 9999 );
		
		// Title tag
		add_theme_support( 'title-tag' );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'aside' ) );
		
		// Add nav menu
		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'davis' ) );
		
		// Make the theme translation ready
		load_theme_textdomain( 'davis', get_template_directory() . '/languages' );
		
		$locale_file = get_template_directory() . "/languages/" . get_locale();
		
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}
		
	}
	add_action( 'after_setup_theme', 'davis_setup' );
endif;


/* ENQUEUE STYLES
------------------------------------------------ */

if ( ! function_exists( 'davis_load_style' ) ) :
	function davis_load_style() {

		$theme_version = wp_get_theme( 'davis' )->get( 'Version' );

		if ( ! is_admin() ) {
			wp_register_style( 'davis_fonts', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' );
			wp_enqueue_style( 'davis_style', get_stylesheet_uri(), array( 'davis_fonts' ) );
		} 

	}
	add_action( 'wp_enqueue_scripts', 'davis_load_style' );
endif;


/* ENQUEUE COMMENT-REPLY.JS
------------------------------------------------ */

if ( ! function_exists( 'davis_load_scripts' ) ) :
	function davis_load_scripts() {

		$theme_version = wp_get_theme( 'davis' )->get( 'Version' );

		wp_enqueue_script( 'davis_construct', get_template_directory_uri() . '/assets/js/construct.js', array( 'jquery' ), $theme_version, true );

		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'davis_load_scripts' );
endif;


/* BODY CLASSES
------------------------------------------------ */

if ( ! function_exists( 'davis_body_classes' ) ) :
	function davis_body_classes( $classes ) {

		// Check whether we want it darker
		if ( get_theme_mod( 'davis_dark_mode' ) ) {
			$classes[] = 'dark-mode';
		}
		
		return $classes;

	}
	add_action( 'body_class', 'davis_body_classes' );
endif;


/* CUSTOMIZER SETTINGS
------------------------------------------------ */

class davis_customize {

	public static function davis_register ( $wp_customize ) {

		// Dark Mode
		$wp_customize->add_setting( 'davis_dark_mode', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'davis_sanitize_checkbox',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'davis_dark_mode', array(
			'type' 			=> 'checkbox',
			'section' 		=> 'colors', // Default WP section added by background_color
			'label' 		=> __( 'Dark Mode', 'davis' ),
			'description' 	=> __( 'Displays the site with white text and black background. If Background Color is set, only the text color will change.', 'davis' ),
		) );
		

		// Make built-in controls use live JS preview
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		
		
		// SANITATION

		// Sanitize boolean for checkbox
		function davis_sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}
		
	}

	// Initiate the live preview JS
	public static function davis_live_preview() {
		wp_enqueue_script( 'davis-themecustomizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array(  'jquery', 'customize-preview' ), '', true );
	}

}

// Setup the Theme Customizer settings and controls
add_action( 'customize_register', array( 'davis_customize', 'davis_register' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'davis_customize' , 'davis_live_preview' ) );


/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */


if ( ! function_exists( 'davis_add_gutenberg_features' ) ) :
	function davis_add_gutenberg_features() {

		/* Gutenberg Palette --------------------------------------- */

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'davis' ),
				'slug' 	=> 'black',
				'color' => '#000',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'davis' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

	}
	add_action( 'after_setup_theme', 'davis_add_gutenberg_features' );
endif;


?>