<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );

  $text = get_query_var( 'hero-text' );

  $link_url = get_query_var( 'hero-link-url' );
  $link_text = get_query_var( 'hero-link-text' );

  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );
  $opacity = get_query_var( 'hero-opacity' ) != '' ? get_query_var( 'hero-opacity' ) : get_theme_mod( 'default_hero_overlay_opacity' );
?>

<div class="her-Hero">
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
        <?php if ($text != ''): ?>
          <p class="her-Hero_Text"><?php echo $text; ?></p>
        <?php endif; ?>
        <?php if ($link_url != ''): ?>
          <a href="<?php echo $link_url; ?>" class="her-Hero_Link" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
