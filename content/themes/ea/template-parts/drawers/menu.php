<div class="drawer" data-drawer="menu">
 <div class="drawer__inner">
   <div class="drawer__header">
     <a class="drawer__logo" href="/" title="<?php bloginfo( 'name' ); ?>">
       <span class="utility__screen-reader-only"><?php bloginfo( 'name' ); ?>"</span>
       <?php get_template_part( 'template-parts/global/logo' ); ?>
     </a>
     <button class="drawer__close" aria-label="Close" data-drawer-menu-close>
       <?php get_template_part( 'template-parts/icons/icon', 'close' ); ?>
     </button>
     <?php if (get_theme_mod( 'enable_header_button' )): ?>
       <a href="<?php echo get_theme_mod( 'header_button_url' ); ?>" class="drawer__button" <?php if (get_theme_mod( 'header_button_external_link' )) echo 'target="_blank"' ?> title="<?php echo get_theme_mod( 'header_button_text' ); ?>"><?php echo get_theme_mod( 'header_button_text' ); ?></a>
     <?php endif; ?>
   </div>
   <div class="drawer__body">
     <nav class="drawer__nav">
       <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
     </nav>
   </div>
 </div>
</div>
