<?php
  /*
    CTA Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $title = get_theme_mod( 'cta_block_title' );
  $text = get_theme_mod( 'cta_block_text' );
  $link_url = get_theme_mod( 'cta_block_button_link' );
  $link_url_external = get_theme_mod( 'cta_block_button_link_external' );
  $link_text = get_theme_mod( 'cta_block_button_text' );
  $background_image_url = get_theme_mod( 'cta_block_background_image' );
  $background_image_opacity = (get_theme_mod( 'cta_block_background_image_opacity' ) * 0.1);
  $background_colour = get_theme_mod( 'cta_block_background_colour' );
?>

<div
  class="cta-block"
  style="background-color: <?php echo $background_colour; ?>;"
>
  <img
    src="<?php echo $background_image_url; ?>"
    alt="<?php echo $title; ?>"
    class="cta-block__background-image"
    <?php if ($background_image_opacity != 1) echo 'style="opacity: ' . $background_image_opacity . ';"'; ?>
  >
  <div class="cta-block__inner">
    <div class="cta-block__body">
      <div class="cta-block__content<?php if (!$background_image_url) echo ' cta-block__content--no-image'; ?>">
        <h3 class="cta-block__title">
          <?php echo $title; ?>
        </h3>
        <p class="cta-block__text">
          <?php echo $text; ?>
        </p>
        <a
          href="<?php echo $link_url; ?>"
          class="cta-block__link<?php if ($link_url_external) echo ' cta-block__link--external'; ?>"
          <?php if ($link_url_external) echo ' target="_blank"'; ?>
          <?php echo 'title="' . $link_text . '"'; ?>
        >
          <?php echo $link_text; ?>
        </a>
      </div>
      <div class="cta-block__bottom-border"></div>
    </div>
  </div>
</div>
