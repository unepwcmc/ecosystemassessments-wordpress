<?php
  /*
    Top Level Landing Page Intro Block
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

  $show_social = block_field( 'show-social', false);

  $flipped = block_field( 'flipped', false);
?>

<div class="block-intro">
  <div class="block-intro__body">
    <div class="block-intro__columns<?php if($flipped) echo ' block-intro__columns-flipped' ?>">
      <div class="block-intro__column">
        <div class="block-intro__content">
          <?php if ($lead_text != ''): ?>
            <p class="block-intro__lead-text"><?php echo $lead_text; ?></p>
          <?php endif; ?>
          <?php if ($text != ''): ?>
            <p class="block-intro__text"><?php echo $text; ?></p>
          <?php endif; ?>
          <?php if ($link_url != ''): ?>
            <a class="block-intro__link" href="<?php echo $link_url; ?>" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="block-intro__column">
        <div class="block-intro__image-wrap block-intro__image-wrap-primary">
          <img class="block-intro__image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
        </div>
        <div class="block-intro__image-wrap block-intro__image-wrap-secondary">
          <img class="block-intro__image" src="<?php echo get_stylesheet_directory_uri() . '/inc/img/pattern-bg-bright.png'; ?>" alt="Background pattern">
        </div>
      </div>
    </div>
  </div>
  <?php if ($show_social): ?>
    <div class="block-intro__footer">
      <?php get_template_part( 'template-parts/social/social', 'share' ); ?>
    </div>
  <?php endif; ?>
</div>
