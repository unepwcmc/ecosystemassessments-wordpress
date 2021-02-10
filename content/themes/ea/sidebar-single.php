<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<aside class="lyt-Sidebar lyt-Sidebar--right">
	<ul class="lyt-SideBar_Items">
		<?php if ( is_singular( array( 'post', 'event' ) ) ) : ?>
			<li class="lyt-SideBar_Item">
				<p class="lyt-SideBar_Text lyt-Sidebar_Text--heading">Date</p>
				<?php if (get_field( 'date_end' )) : ?>
					<p class="lyt-SideBar_Text"><?php echo get_field( 'date_start' ) . ' - ' . get_field( 'date_end' ); ?></p>
				<?php else : ?>
					<p class="lyt-SideBar_Text"><?php echo get_field( 'date_start' ) ?  get_field( 'date_start' ) : the_date('j F Y'); ?></p>
				<?php endif; ?>
			</li>
		<?php endif ?>
		<?php if ( get_field( 'time' ) ) : ?>
			<li class="lyt-SideBar_Item">
				<p class="lyt-SideBar_Text lyt-Sidebar_Text--heading">Time</p>
				<p class="lyt-SideBar_Text"><?php echo get_field( 'time' ); ?></p>
			</li>
		<?php endif ?>
		<?php if ( get_field( 'location' ) ) : ?>
			<li class="lyt-SideBar_Item">
				<p class="lyt-SideBar_Text lyt-Sidebar_Text--heading">Location</p>
				<p class="lyt-SideBar_Text"><?php echo get_field( 'location' ); ?></p>
			</li>
		<?php endif ?>
	</ul>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	  <div class="sbr-Widgets">
	    <ul class="sbr-Widgets_Items">
				<?php dynamic_sidebar( 'sidebar' ); ?>
	    </ul>
	  </div>
	<?php	endif; ?>
</aside>
