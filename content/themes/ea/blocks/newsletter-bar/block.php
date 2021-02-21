<?php if (get_theme_mod( 'newsletter_enabled' )): ?>
  <div class="footer-newsletter">
    <div class="footer-newsletter__inner">
      <div class="footer-newsletter__content">
        <p class="footer-newsletter__text"><?php echo get_theme_mod( 'newsletter_text' ); ?></p>
        <a href="<?php echo get_theme_mod( 'newsletter_link_url' ); ?>" class="footer-newsletter__link"><?php echo get_theme_mod( 'newsletter_link_text' ); ?></a>
      </div>
    </div>
  </div>
<?php endif; ?>
