<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

	$category = get_the_category();
	$registration_link = get_field( 'registration_url' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry richtext' ); ?>>
	<div class="entry__body">
		<div class="entry__content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>' ),
					get_the_title()
					)
				);

				wp_link_pages(
					array(
						'before'      => '<div class="page-links">' . __( 'Pages:' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php if ( is_singular( 'event' ) && $registration_link ) : ?>
				<a href="<?php echo $registration_link ?>" class="entry__link" target="_blank">Click here to register</a>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/social/social', 'share'); ?>
	</div>

</article><!-- #post-## -->
