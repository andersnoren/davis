<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>

		<a class="skip-link screen-reader-text" href="#site-content"><?php _e( 'Skip to the content', 'davis' ); ?></a>
		<a class="skip-link screen-reader-text" href="#menu-menu"><?php _e( 'Skip to the main menu', 'davis' ); ?></a>
    
        <header class="site-header" role="banner">
            
            <button type="button" class="toggle-menu" onclick="document.querySelector('body').classList.toggle('show-menu')"><?php _e( 'Menu', 'davis' ); ?></button>

			<?php if ( has_nav_menu( 'primary-menu' ) ) : ?> 

				<nav class="site-nav" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
				</nav>

			<?php endif; ?>

			<?php $site_title_elem = is_front_page() ? 'h1' : 'div'; ?>
			
			<<?php echo $site_title_elem; ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></<?php echo $site_title_elem; ?>>

            <?php if ( get_bloginfo( 'description' ) ) : ?>
                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
            <?php endif; ?>

        </header><!-- header -->
		
		<main class="wrapper" id="site-content" role="main">

			<?php if ( is_archive() || is_search() ) :

				if ( is_search() ) {
					global $wp_query;
					// Translators: %s = The search query
					$archive_title = sprintf( _x( 'Search Results: &ldquo;%s&rdquo;', '%s = The search query', 'davis' ), get_search_query() );
					$archive_description = sprintf( _nx( '%s result was found.', '%s results were found.', $wp_query->found_posts, '%s = The search query', 'davis' ), $wp_query->found_posts );
				} else {
					$archive_title = get_the_archive_title();
					$archive_description = get_the_archive_description();
				}
				?>

				<header class="archive-header">
					<?php if ( $archive_title ) : ?>
						<h1 class="archive-title"><?php echo $archive_title; ?></h1>
					<?php endif; ?>
					<?php if ( $archive_description ) : ?>
						<div class="archive-description"><?php echo $archive_description; ?></div>
					<?php endif; ?>
				</header>

			<?php endif; ?>

            <?php if ( have_posts() )  : 

                while ( have_posts() ) : the_post(); ?>

                    <div <?php post_class( 'post' ); ?>>

						<?php if ( ! get_post_format() == 'aside' ) : 

							$post_title_elem = is_single() ? 'h1' : 'h2';
						
							?>

                            <<?php echo $post_title_elem; ?> class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $post_title_elem; ?>>

                        <?php endif; ?>
                        
                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                        
                            <a href="<?php the_permalink(); ?>" class="featured-image">
                                <?php the_post_thumbnail(); ?>    
                            </a>
                            
                        <?php endif; ?>

                        <div class="content">

                            <?php 
							if ( is_search() ) {
								the_excerpt();
							} else {
								the_content(); 
								edit_post_link();
							}
							?>

                        </div><!-- .content -->

                        <?php 
                        
                        if ( is_singular() ) wp_link_pages();

                        if ( get_post_type() == 'post' ) : ?>

                            <div class="meta">

                                <p>
                                
                                    <a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

                                    <?php if ( comments_open() && ! post_password_required() ) : ?>
                                        <span class="sep"></span><?php comments_popup_link( __( 'Add Comment', 'davis' ), __( '1 Comment', 'davis' ), '% ' . __( 'Comments', 'davis' ), '', __( 'Comments off', 'davis' ) ); ?>
                                    <?php endif; ?>
                                    
                                    <?php if ( is_sticky() ) : ?>
                                        <span class="sep"></span><?php _e( 'Sticky', 'davis' ); ?>
                                    <?php endif ?>

                                </p>

                                <?php if ( is_singular( 'post' ) ) : ?>
                                    <p><?php _e( 'In', 'davis' ); ?> <?php the_category( ', ' ); ?></p>
                                    <p><?php the_tags( ' #', ' #', ' ' ); ?></p>
                                <?php endif; ?>

                            </div><!-- .meta -->

                        <?php endif;
                        
                        if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
							comments_template();
						}  
						
						?>

                    </div><!-- .post -->

                    <?php 
                
                endwhile;

            elseif ( is_404() ) : ?>

                <div class="post">
                    <p><?php _e( 'Sorry, the page you requested cannot be found.', 'davis' ); ?></p>
                </div><!-- .post -->

            <?php endif;
            
            if ( ! is_singular() && ( get_previous_posts_link() || get_next_posts_link() ) ) : ?>
	        
		        <div class="pagination">
					<?php previous_posts_link( '&larr; ' . __( 'Newer posts', 'davis' ) ); ?>
					<?php next_posts_link( __( 'Older posts', 'davis') . ' &rarr;' ); ?>
		        </div><!-- .pagination -->
	        
	        <?php endif; ?>
	        
	        <footer class="site-footer" role="contentinfo">
		        
		        <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		        <p><?php _e( 'Theme by', 'davis' ); ?> <a href="https://andersnoren.se">Anders Nor&eacute;n</a></p>
		        
	        </footer><!-- footer -->
	        
		</main><!-- .wrapper -->
	    
	    <?php wp_footer(); ?>
	        
	</body>
</html>