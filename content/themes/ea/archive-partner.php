<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	if (isset($_GET['type'])) {
		$partner_type_slug = $_GET['type'];
		$term_label = 'partner_type';
		$partner_type_term = get_term_by('slug', $partner_type_slug, $term_label);
		$term_id = $partner_type_term->term_id;
	}

	$post_type = get_queried_object()->name;

	// Page Hero
	set_query_var( 'hero-title', get_theme_mod( 'partners_hero_title' ) != ''
		? get_theme_mod( 'partners_hero_title' )
		: get_the_archive_title() );
	set_query_var( 'hero-text', get_theme_mod( 'partners_hero_text' ) );
	$hero_link = get_theme_mod( 'partners_hero_button_link' ) != 0
		? get_page_link( get_theme_mod( 'partners_hero_button_link' ) )
		: '';
	set_query_var( 'hero-link-url', $hero_link );
	set_query_var( 'hero-link-text', get_theme_mod( 'partners_hero_button_text' ) );
	set_query_var( 'hero-background-image', get_theme_mod( 'partners_hero_image') );
	set_query_var( 'hero-opacity', get_theme_mod( 'partners_hero_overlay_opacity' ) );

	get_template_part( 'template-parts/components/heroes/hero', 'page' );

?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<listing-grid
						post-type="<?php echo $post_type; ?>"
						term-label="<?php echo $term_label; ?>"
						term-id="<?php echo $term_id; ?>"
						:modal="true" />
					/>

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
