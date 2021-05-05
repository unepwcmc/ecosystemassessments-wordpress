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
	$post_type = get_post_type();
	$post_type_label = get_post_type_label(	$post_type );
	$is_event = $post_type === 'event';
	$is_process = $post_type === 'process';
	$is_resource = $post_type === 'resource';

	$cta_link_text = get_field( 'cta_link_text' );
	$cta_link_url = get_field( 'cta_link_url' );
	$cta_link_external = get_field( 'external_link' );

	if ($is_event) {
		$event_start_date = get_field( 'date_start' );
		$event_end_date = get_field( 'date_end' );
		$event_time = get_field( 'time' );
		$event_location = get_field( 'location' );
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry richtext' ); ?>>
	<div class="entry__header">
		<?php if ($is_process) {
			get_template_part('template-parts/components/buttons/button-back', 'content');
		} else {
			get_template_part('template-parts/components/buttons/button-back', 'single');
		} ?>
		<h2 class="entry__title">
			<?php the_title(); ?>
		</h2>

		<ul class="entry__details">
			<li class="entry__detail">
				<?php echo $post_type_label; ?>
			</li>

			<li class="entry__detail">
				<?php if ($event_start_date): ?>
					<?php echo $event_start_date; ?>
					<?php if ($event_end_date) echo ' - ' . $event_end_date; ?>
				<?php else : ?>
					<?php echo the_date('j F Y'); ?>
				<?php endif; ?>
			</li>

			<?php if ($event_time): ?>
				<li class="entry__detail">
					<?php echo $event_time; ?>
				</li>
			<?php endif; ?>

			<?php if ($event_location): ?>
				<li class="entry__detail">
					<?php echo $event_location; ?>
				</li>
			<?php endif; ?>
		</ul>
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
				<?php if ($is_resource) : ?>
					<!-- Downloads List -->
					<?php get_template_part( 'template-parts/components/resources/resource', 'download-list' ); ?>
				<?php endif; ?>

				<?php if ($cta_link_url && $cta_link_text) : ?>
					<a href="<?php echo $cta_link_url ?>" class="entry__link<?php if ($cta_link_external) echo ' entry__link--external'; ?>"<?php if ($cta_link_external) echo ' target="_blank"'; ?>>
						<?php echo $cta_link_text; ?>
						<?php if ($cta_link_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
					</a>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/social/social', 'share' ); ?>
			</div><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
