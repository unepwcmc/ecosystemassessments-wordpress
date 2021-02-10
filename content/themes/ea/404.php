<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header(); ?>

<?php
	set_query_var('hero-title', 'Oops! That page can&rsquo;t be found.');
	get_template_part('template-parts/components/heroes/hero', 'page');
?>

<div class="lyt-Container">
	<div class="lyt-Container_Inner">
		<div class="lyt-Container_Body">
			<section class="lyt-Primary lyt-Primary--restrained error-404 not-found">
				<div class="lyt-Primary_Body">
					<div class="ent-Entry">
						<header class="ent-Entry_Header">
							<h3 class="ent-Entry_Title"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></h3>
						</header>
						<div class="ent-Entry_Body">
							<div class="ent-Entry_Content">
								<form class="lyt-Search_Form" role="search" method="get" id="searchpageform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<label class="utl-ScreenReaderOnly" for="s">Search for:</label>

									<input type="text" value="" name="s" id="s" class="lyt-Search_Input" placeholder="Search here" />

									<input class="lyt-Search_Button" type="submit"></input>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<?php
get_footer();
