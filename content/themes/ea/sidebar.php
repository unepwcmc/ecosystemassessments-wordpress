<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="lyt-Sidebar">
	<ul class="lyt-SideBar_Items">
		<li class="lyt-SideBar_Item">
			<p class="lyt-SideBar_Text lyt-Sidebar_Text--heading">Date</p>
			<p class="lyt-SideBar_Text"><?php the_date(); ?></p>
		</li>
	</ul>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sbr-Widgets">
	    <ul class="sbr-Widgets_Items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
