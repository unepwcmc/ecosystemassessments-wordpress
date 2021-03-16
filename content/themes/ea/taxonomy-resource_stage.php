<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	$post_type = 'resource';

	if ( get_query_var('resource_stage') ) {
		$resource_stage_slug = get_query_var('resource_stage');
		$resource_stage_term = get_term_by('slug', $resource_stage_slug, 'resource_stage');
		$resource_stage = $resource_stage_term->term_id;
	}

	if ( get_query_var('resource_type') ) {
		$resource_type_slug = get_query_var('resource_type');
		$resource_type_term = get_term_by('slug', $resource_type_slug, 'resource_type');
		$resource_type = $resource_type_term->term_id;
	}

	// Page Hero
	set_query_var( 'hero-title', get_theme_mod( 'resources_hero_title' ) != ''
		? get_theme_mod( 'resources_hero_title' )
		: get_the_archive_title() );
	set_query_var( 'hero-background-image', get_theme_mod( 'resources_hero_image' ) );
	set_query_var( 'hero-opacity', get_theme_mod( 'resources_hero_overlay_opacity' ) );

	get_template_part( 'template-parts/components/heroes/hero', 'page' );
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<listing-grid
						post-type="<?php echo $post_type; ?>"
						resource-stage="<?php echo $resource_stage ?>"
						resource-type="<?php echo $resource_type ?>"
					/>

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
