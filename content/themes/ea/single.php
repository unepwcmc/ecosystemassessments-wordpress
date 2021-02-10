<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/* Variables */
			$hero_title = get_field( 'hero_title' ) != '' ? get_field( 'hero_title' ) : get_the_title();
			set_query_var('hero-title', $hero_title);
			set_query_var('hero-text', get_field( 'hero_text' ));
			set_query_var('hero-link-text', get_field( 'button_1_text' ));
			set_query_var('hide-text', get_field( 'hide_text' ));
			set_query_var('hero-link-url', get_field( 'button_1_url' ));
			set_query_var('hero-link-text-2', get_field( 'button_2_text' ));
			set_query_var('hero-link-url-2', get_field( 'button_2_url' ));
			set_query_var('hide-buttons', get_field( 'hide_buttons' ));
			set_query_var('hero-background-image', get_post_thumbnail_id(get_the_id()));
			set_query_var('hero-opacity', get_field( 'opacity' ));

			get_template_part( 'template-parts/components/heroes/hero', 'post' );

		endwhile; // End of the loop.
	endif; wp_reset_query();
?>

<div class="lyt-Container lyt-Container--hasSidebar lyt-Container--sidebarRight">
	<div class="lyt-Container_Inner">
		<div class="lyt-Container_Body">
			<?php get_sidebar('single'); ?>
			<section class="lyt-Primary lyt-Primary--restrained">
				<div class="lyt-Primary_Body">
					<?php
						/* Start the Loop */
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'single' );
							endwhile;
						endif; wp_reset_query();// End of the loop.
					?>
				</div>
			</section>
		</div>
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
						<div class="lyt-Container_Footer">
							<div class="ent-Comments">
								<div class="ent-Comments_Inner">
									<div class="ent-Comments_Header">
										<h3 class="ent-Comments_Title">Comments</h3>
									</div>
									<div class="ent-Comments_Body">
								    <?php comments_template(); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif;

				endwhile;
			endif; wp_reset_query(); // End of the loop.
		?>
	</div>
</div>

<?php get_footer();
