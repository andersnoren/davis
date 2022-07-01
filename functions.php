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

		wp_register_style( 'davis_fonts', get_theme_file_uri( '/assets/css/fonts.css' ) );
		wp_enqueue_style( 'davis_style', get_stylesheet_uri(), array( 'davis_fonts' ), $theme_version );

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


/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */

if ( ! function_exists( 'davis_add_block_editor_features' ) ) :
	function davis_add_block_editor_features() {

		/* Gutenberg Palette --------------------------------------- */

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> __( 'Black', 'davis' ),
				'slug' 	=> 'black',
				'color' => '#000',
			),
			array(
				'name' 	=> __( 'White', 'davis' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

	}
	add_action( 'after_setup_theme', 'davis_add_block_editor_features' );
endif;
