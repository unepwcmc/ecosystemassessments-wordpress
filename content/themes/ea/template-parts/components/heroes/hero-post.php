<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );
  $registration_link = get_field( 'registration_url' );

  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );
  $opacity = get_query_var( 'hero-opacity' ) != '' ? get_query_var( 'hero-opacity' ) : get_theme_mod( 'default_hero_overlay_opacity' );
?>

<div class="hero hero--post">
  <div class="hero__inner">
    <div class="hero__body">
      <div class="hero__background-image">
        <img src="<?php echo $background_image_url; ?>" alt="<?php echo $title; ?>">
      </div>
      <div class="hero__overlay" style="opacity: <?php echo $opacity; ?>"></div>
      <div class="hero__content">
        <?php if ($title != ''): ?>
          <h2 class="hero__title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ( is_singular( 'event' ) ) : ?>
          <h3 class="hero__heading">Event</h3>
          <?php if ( $registration_link ) : ?>
            <a href="<?php echo $registration_link; ?>" class="hero__link" target="_blank">Register</a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
