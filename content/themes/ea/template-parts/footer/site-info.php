<?php
/**
* Displays footer site info
**/
?>
<?php /*
<a href="https://www.ipbes.net" target="_blank" title="IPBES">
  <?php // TODO: IPBES Image ?>
</a>
*/?>
<?php if ( get_theme_mod( 'enable_footer_tagline' ) ): ?>
  <p class="footer__text" ><em><?php echo get_theme_mod( 'footer_tagline' ); ?></em></p>
<?php endif; ?>

<p class="footer__text"><?php _e( 'Copyright UNEP-WCMC', 'wcmc' ); ?> <?php echo date("Y"); ?></p><!-- .site-info -->
