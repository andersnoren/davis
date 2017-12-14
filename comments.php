<?php if ( $comments ) : ?>

	<div class="comments">
	  
		<h3 class="comment-reply-title"><?php _e( 'Comments', 'davis' ) ?></h3>
		
		<?php wp_list_comments( array( 'style' => 'div' ) ); ?>
		
		<?php if ( paginate_comments_links( array( 'echo' => false ) ) ) : ?>
		
			<div class="pagination"><?php paginate_comments_links(); ?></div>
		
		<?php endif; ?>
    
	</div><!-- .comments -->
  
<?php endif;

if ( comments_open() || pings_open() ) :

	comment_form( array( 
		'comment_notes_before' 	=> '', 
		'comment_notes_after' 	=> '' 
	) );
	
elseif ( $comments ) : ?>

	<div id="respond">
		
		<p class="closed"><?php _e( 'Comments closed', 'davis' ); ?></p>
		
	</div><!-- #respond -->

<?php endif; ?>