<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="layout-sidebar">
	<ul class="layout-sidebar__items">
		<li class="layout-sidebar__item">
			<p class="layout-sidebar__text layout-sidebar__text--heading">Date</p>
			<p class="layout-sidebar__text"><?php the_date(); ?></p>
		</li>
	</ul>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sidebar-widgets">
	    <ul class="sidebar-widgets__items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
