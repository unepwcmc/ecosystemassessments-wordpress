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
	$thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/dist/img/square-placeholder.jpg';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-excerpt entry-excerpt--search' ); ?>>
	<div class="entry-excerpt__body">
		<div class="entry-excerpt__columns">
			<div class="entry-excerpt__column">
				<div class="entry-excerpt__thumbnail">
					<img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
				</div>
			</div>
			<div class="entry-excerpt__column">
				<?php
				the_title( sprintf( '<h2 class="entry-excerpt__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				?>
				<p class="entry-excerpt__details"><?php echo get_the_date( get_option('date_format') ); ?></p>
				<?php if (get_the_excerpt() != ''): ?>
					<p class="entry-excerpt__content"><?php
						the_excerpt();
					?></p>
				<?php endif; ?>
				<a class="entry-excerpt__link" href="<?php the_permalink(); ?>" title="<?php _e( 'Read more', 'wcmc' ); ?>">
					<?php get_template_part( '/template-parts/icons/icon', 'arrow-right' ); ?>
					<?php _e( 'Read more', 'wcmc' ); ?>
				</a>
			</div>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
