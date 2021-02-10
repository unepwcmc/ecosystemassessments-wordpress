<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="lyt-Sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sbr-Widgets">
	    <ul class="sbr-Widgets_Items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
