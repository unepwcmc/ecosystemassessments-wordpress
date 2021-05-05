<?php
/**
 * The template for displaying full width page
 *
 Template Name: Full Width
 *
 */

get_header(); ?>

<?php
	// Page Hero

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/* Variables */
			$hero_title = get_field( 'hero_title' ) != '' ? get_field( 'hero_title' ) : get_the_title();
			set_query_var('hero-title', $hero_title);
			set_query_var('hero-text', get_field( 'hero_text' ));
			set_query_var('hero-background-image', get_post_thumbnail_id(get_the_id()));
			set_query_var('hero-opacity', get_field( 'hero_opacity' ));

			get_template_part( 'template-parts/components/heroes/hero', 'page' );

		endwhile; // End of the loop.
	endif;
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'page' );

							endwhile; // End of the loop.
						else :
								get_template_part( 'template-parts/content/content', 'none' );
						endif;
					?>
				</div>
			</section>
		</div>
	</div>
</div>
<?php
get_footer();
