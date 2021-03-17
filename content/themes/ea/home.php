<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	$post_type = 'posts';

	// Page Hero
	set_query_var( 'hero-title', get_theme_mod( 'news_hero_title' ) != ''
		? get_theme_mod( 'news_hero_title' )
		: get_the_archive_title() );
	set_query_var( 'hero-text', get_theme_mod( 'news_hero_text' ) );
	$hero_link = get_theme_mod( 'news_hero_button_link' ) != 0
		? get_page_link( get_theme_mod( 'news_hero_button_link' ) )
		: '';
	set_query_var( 'hero-link-url', $hero_link );
	set_query_var( 'hero-link-text', get_theme_mod( 'news_hero_button_text' ) );
	set_query_var( 'hero-background-image', get_theme_mod( 'news_hero_image') );
	set_query_var( 'hero-opacity', get_theme_mod( 'news_hero_overlay_opacity' ) );

	get_template_part( 'template-parts/components/heroes/hero', 'page' );

	if (isset($_GET['category'])) {
		$category_slug = $_GET['category'];
		// $term_label = 'resource_stage';
		// $resource_stage_term = get_term_by('slug', $resource_stage_slug, $term_label);
		// $term_id = $resource_stage_term->term_id;
	}
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<h1><?php echo 'Category slug: ' . $category_slug; ?></h1>

					<listing-grid post-type="<?php echo $post_type; ?>" />

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
