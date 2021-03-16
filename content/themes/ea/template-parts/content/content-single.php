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

	$post_type_slug = get_post_type();

	$post_type = get_post_type_object( $post_type_slug );

	$post_type_singular_name = $post_type->labels->singular_name;

	$post_type_label = $post_type_singular_name == 'Post' ?
		__( 'News', 'wcmc' ) :
		$post_type_singular_name;

	$is_resource = $post_type_slug === 'resource';

	if ($is_resource) {
		$resource_link = get_field( 'resource_link' );
		$resource_link_external = get_field( 'external_link' );
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry richtext' ); ?>>
	<div class="entry__header">
		<h2 class="entry__title"><?php the_title(); ?></h2>
		<p class="entry__details"><?php echo $post_type_label; ?> • <?php echo the_date('j F Y'); ?></p>
		<?php if ($is_resource && $resource_link) : ?>
			<a href="<?php echo $resource_link ?>" class="entry__resource-link<?php if ($resource_link_external) echo ' entry__resource-link--external'; ?>" title="Navigate to resource on <?php the_title(); ?>"<?php if ($resource_link_external) echo ' target="_blank"'; ?>>
				Click here to view resource on <?php the_title(); ?>
				<?php if ($resource_link_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
			</a>
		<?php endif; ?>
	</div><!-- .entry-header -->
	<div class="entry__body">
		<div class="entry__content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wcmc' ),
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
			<div class="entry__footer">
				<?php if ($is_resource && $resource_link) : ?>
					<a href="<?php echo $resource_link ?>" class="entry__link<?php if ($resource_link_external) echo ' entry__link--external'; ?>"<?php if ($resource_link_external) echo ' target="_blank"'; ?>>
						View
						<?php if ($resource_link_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
					</a>
				<?php endif; ?>
				<?php get_template_part( 'template-parts/social/social', 'share' ); ?>
			</div><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
