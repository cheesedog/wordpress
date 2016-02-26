<?php
/**
 * The template used for displaying ask landing content
 *
 * @package WordPress
 * @subpackage Onerockwell
 * @since Onerockwell 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php onerockwell_post_thumbnail(); ?>
    
    <div class="ask-me-contianer">
    <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            // comments_template();
            
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            
            
            $fields =  array(
                'author' =>
                '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>'
            );
            
            
            $comments_args = array(
                'id_form'           => 'commentform',
                'class_form'      => 'comment-form',
                'id_submit'         => 'submit',
                'class_submit'      => 'submit',
                'name_submit'       => 'submit',
                'title_reply'       => __( 'Ask me!' ),
                'title_reply_to'    => __( 'Leave a Reply to %s' ),
                'cancel_reply_link' => __( 'Cancel Reply' ),
                'label_submit'      => __( 'Post Comment' ),
                'format'            => 'xhtml',

                'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Your question', 'noun' ) .
                '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
                '</textarea></p>',

                'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                  __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</p>',

                'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                  admin_url( 'profile.php' ),
                  $user_identity,
                  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                ) . '</p>',

                'comment_notes_before' => '',

                'comment_notes_after' => '',

                'fields' => apply_filters( 'comment_form_default_fields', $fields ),
            );
            
            comment_form($comments_args, get_the_ID());
        }
    ?>
    </div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'onerockwell' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'onerockwell' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
