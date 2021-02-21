<?php
  /*
    Homepage Intro Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  /* Variables */
  $lead_text = block_field( 'lead-text', false );
  $text = block_field( 'text', false );
  $link_url = block_field( 'link-url', false );
  $link_text = block_field( 'link-text', false );
  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
  $image_alt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);

  $flipped = block_field( 'flipped', false);
?>

<div class="block-home-intro">
  <div class="block-home-intro__body">
    <div class="block-home-intro__columns<?php if($flipped) echo ' block-home-intro__columns-flipped' ?>">
      <div class="block-home-intro__column">
        <div class="block-home-intro__content">
          <p class="block-home-intro__lead-text"><?php echo $lead_text; ?></p>
          <p class="block-home-intro__text"><?php echo $text; ?></p>
          <a class="block-home-intro__link" href="<?php echo $link_url; ?>" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a>
        </div>
      </div>
      <div class="block-home-intro__column">
        <div class="block-home-intro__image-wrap block-home-intro__image-wrap-primary">
          <img class="block-home-intro__image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
        </div>
        <div class="block-home-intro__image-wrap block-home-intro__image-wrap-secondary">
          <img class="block-home-intro__image" src="<?php echo get_stylesheet_directory_uri() . '/inc/img/pattern-bg-bright.png'; ?>" alt="Background pattern">
        </div>
      </div>
    </div>
  </div>
</div>
