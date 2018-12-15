<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<a class="skip-link screen-reader-text" href="#site-content"><?php _e( 'Skip to the content', 'koji' ); ?></a>
		<a class="skip-link screen-reader-text" href="#menu-menu"><?php _e( 'Skip to the main menu', 'koji' ); ?></a>
    
        <header role="banner">
            
            <button type="button" class="toggle-menu" onclick="document.querySelector('body').classList.toggle('show-menu')"><?php _e( 'Menu', 'davis' ); ?></button>

			<?php if ( has_nav_menu( 'primary-menu' ) ) : ?> 

				<nav role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
				</nav>

			<?php endif; ?>
			
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

            <?php if ( get_bloginfo( 'description' ) ) : ?>
                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
            <?php endif; ?>

        </header><!-- header -->
		
		<main class="wrapper" id="site-content" role="main">

            <?php if ( have_posts() )  : 

                while ( have_posts() ) : the_post(); ?>

                    <div <?php post_class( 'post' ); ?>>

						<?php if ( ! get_post_format() == 'aside' ) : ?>

                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <?php endif; ?>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                        
                            <a href="<?php the_permalink(); ?>" class="featured-image">
                                <?php the_post_thumbnail( 'post-image' ); ?>    
                            </a>
                            
                        <?php endif; ?>

                        <div class="content">

                            <?php the_content(); ?>

                        </div><!-- .content -->

                        <?php 
                        
                        if ( is_singular() ) wp_link_pages();

                        if ( get_post_type() == 'post' ) : ?>

                            <div class="meta">

                                <p>
                                
                                    <a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

                                    <?php if ( comments_open() ) : ?>
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
                        
                        if ( is_singular() ) comments_template(); ?>

                    </div><!-- .post -->

                    <?php 
                
                endwhile;

            else : ?>

                <div class="post">

                    <p><?php _e( 'Sorry, the page you requested cannot be found.', 'davis' ); ?></p>

                </div><!-- .post -->

            <?php endif;
            
            if ( ( ! is_singular() ) && ( $wp_query->post_count >= get_option( 'posts_per_page' ) ) ) : ?>
	        
		        <div class="pagination">
			        
					<?php previous_posts_link( '&larr; ' . __( 'Newer posts', 'davis' ) ); ?>
					<?php next_posts_link( __( 'Older posts', 'davis') . ' &rarr;' ); ?>
					
		        </div><!-- .pagination -->
	        
	        <?php endif; ?>
	        
	        <footer role="contentinfo">
		        
		        <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		        <p><?php _e( 'Theme by', 'davis' ); ?> <a href="http://www.andersnoren.se">Anders Nor&eacute;n</a></p>
		        
	        </footer><!-- footer -->
	        
		</main><!-- .wrapper -->
	    
	    <?php wp_footer(); ?>
	        
	</body>
</html>