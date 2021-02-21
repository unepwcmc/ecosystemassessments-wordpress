<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="layout-sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sidebar-widgets">
	    <ul class="sidebar-widgets__items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
