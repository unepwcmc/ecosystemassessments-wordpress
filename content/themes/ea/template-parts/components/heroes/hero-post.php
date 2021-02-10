<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );
  $registration_link = get_field( 'registration_url' );

  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );
  $opacity = get_query_var( 'hero-opacity' ) != '' ? get_query_var( 'hero-opacity' ) : get_theme_mod( 'default_hero_overlay_opacity' );
?>

<div class="her-Hero her-Hero--post">
  <div class="her-Hero_Inner">
    <div class="her-Hero_Body">
      <div class="her-Hero_BackgroundImage">
        <img src="<?php echo $background_image_url; ?>" alt="<?php echo $title; ?>">
      </div>
      <div class="her-Hero_Overlay" style="opacity: <?php echo $opacity; ?>"></div>
      <div class="her-Hero_Content">
        <?php if ($title != ''): ?>
          <h2 class="her-Hero_Title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ( is_singular( 'event' ) ) : ?>
          <h3 class="her-Hero_Heading">Event</h3>
          <?php if ( $registration_link ) : ?>
            <a href="<?php echo $registration_link; ?>" class="her-Hero_Link" target="_blank">Register</a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
