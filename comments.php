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
	
else : ?>

	<div class="comments" id="respond">
		
		<p class="comments-closed"><?php _e( 'Comments are closed.', 'davis' ); ?></p>
		
	</div><!-- #respond -->

<?php endif; ?>