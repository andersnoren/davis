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
		set_post_thumbnail_size( 620, 9999 );
		
		// Title tag
		add_theme_support( 'title-tag' );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'aside' ) );
		
		// Register nav menu
		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'davis' ) );
		
		// Make the theme translation ready
		load_theme_textdomain( 'davis', get_template_directory() . '/languages' );
		
	}
	add_action( 'after_setup_theme', 'davis_setup' );
endif;


/* ENQUEUE STYLES
------------------------------------------------ */

if ( ! function_exists( 'davis_load_style' ) ) :
	function davis_load_style() {

		$theme_version = wp_get_theme( 'davis' )->get( 'Version' );

		wp_register_style( 'davis_fonts', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' );
		wp_enqueue_style( 'davis_style', get_stylesheet_uri(), array( 'davis_fonts' ) );

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

if ( ! class_exists( 'Davis_Customize' ) ) :
	class Davis_Customize {

		public static function davis_register( $wp_customize ) {

			// Dark Mode
			$wp_customize->add_setting( 'davis_dark_mode', array(
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'davis_dark_mode', array(
				'type' 			=> 'checkbox',
				'section' 		=> 'colors', // Default WP section added by background_color
				'label' 		=> __( 'Dark Mode', 'davis' ),
				'description' 	=> __( 'Displays the site with white text and black background. If Background Color is set, only the text color will change.', 'davis' ),
			) );
			
		}

	}
	add_action( 'customize_register', array( 'davis_customize', 'davis_register' ) );
endif;


/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */

if ( ! function_exists( 'davis_add_block_editor_features' ) ) :
	function davis_add_block_editor_features() {

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
	add_action( 'after_setup_theme', 'davis_add_block_editor_features' );
endif;
