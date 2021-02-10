<?php if (get_theme_mod( 'newsletter_enabled' )): ?>
  <div class="ft-Newsletter">
    <div class="ft-Newsletter_Inner">
      <div class="ft-Newsletter_Content">
        <p class="ft-Newsletter_Text"><?php echo get_theme_mod( 'newsletter_text' ); ?></p>
        <a href="<?php echo get_theme_mod( 'newsletter_link_url' ); ?>" class="ft-Newsletter_Link"><?php echo get_theme_mod( 'newsletter_link_text' ); ?></a>
      </div>
    </div>
  </div>
<?php endif; ?>
