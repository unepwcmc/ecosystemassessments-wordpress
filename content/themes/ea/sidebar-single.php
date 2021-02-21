<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="layout-sidebar layout-sidebar--right">
	<ul class="layout-sidebar__items">
		<?php if ( is_singular( array( 'post', 'event' ) ) ) : ?>
			<li class="layout-sidebar__item">
				<p class="layout-sidebar__text layout-sidebar__text--heading">Date</p>
				<?php if (get_field( 'date_end' )) : ?>
					<p class="layout-sidebar__text"><?php echo get_field( 'date_start' ) . ' - ' . get_field( 'date_end' ); ?></p>
				<?php else : ?>
					<p class="layout-sidebar__text"><?php echo get_field( 'date_start' ) ?  get_field( 'date_start' ) : the_date('j F Y'); ?></p>
				<?php endif; ?>
			</li>
		<?php endif ?>
		<?php if ( get_field( 'time' ) ) : ?>
			<li class="layout-sidebar__item">
				<p class="layout-sidebar__text layout-sidebar__text--heading">Time</p>
				<p class="layout-sidebar__text"><?php echo get_field( 'time' ); ?></p>
			</li>
		<?php endif ?>
		<?php if ( get_field( 'location' ) ) : ?>
			<li class="layout-sidebar__item">
				<p class="layout-sidebar__text layout-sidebar__text--heading">Location</p>
				<p class="layout-sidebar__text"><?php echo get_field( 'location' ); ?></p>
			</li>
		<?php endif ?>
	</ul>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sidebar-widgets">
	    <ul class="sidebar-widgets__items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
