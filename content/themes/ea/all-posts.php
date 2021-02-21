<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


get_header(); ?>

<div class="layout-container layout-container--has-sidebar">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<?php get_sidebar(); ?>
			<!-- primary  -->
			<section class="layout-primary">
					<div class="layout-primary__body">
						<?php if ( have_posts() ) : ?>
							<ul class="layout-entry__items">
								<?php while ( have_posts() ) : the_post();
									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/ ?>
									<li class="layout-entry__item">
										<?php get_template_part( 'template-parts/components/cards/card', 'blog' ); ?>
									</li>
								<?php endwhile; ?>
							</ul>
							<?php
							pagination_bar();
							else :
								get_template_part( 'template-parts/content/content', 'none' );
					endif; ?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
