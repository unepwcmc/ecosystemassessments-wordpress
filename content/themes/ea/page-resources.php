<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php
	// Page Hero

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/* Variables */
			set_query_var( 'hero-title', get_theme_mod( 'resources_hero_title' ) != ''
				? get_theme_mod( 'resources_hero_title' )
				: get_the_archive_title() );
			set_query_var( 'hero-background-image', get_theme_mod( 'resources_hero_image' ) );
			set_query_var( 'hero-opacity', get_theme_mod( 'resources_hero_overlay_opacity' ) );

			get_template_part( 'template-parts/components/heroes/hero', 'page' );

		endwhile; // End of the loop.
	endif;
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained">
				<div class="layout-primary__body">
					<h3><a href="/resources/all">All Resources</a></h3>
					<h3>Stages</h3>
					<ul>
						<li>
							<a href="/resources/resource_stage/introductory-resources">Introductory Resources</a>
						</li>
						<li>
							<a href="/resources/resource_stage/scoping">Scoping</a>
						</li>
						<li>
							<a href="/resources/resource_stage/expert-evaluation">Expert Evaluation</a>
						</li>
						<li>
							<a href="/resources/resource_stage/using-assessments ">Using Assessments </a>
						</li>
					</ul>
					<h3>Types</h3>
					<ul>
						<li>
							<a href="/resources/resource_type/videos-webinars">Videos & Webinars</a>
						</li>
						<li>
							<a href="/resources/resource_type/guides">Guides</a>
						</li>
						<li>
							<a href="/resources/resource_type/case-studies">Case studies</a>
						</li>
						<li>
							<a href="/resources/resource_type/reports">Reports</a>
						</li>
					</ul>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
