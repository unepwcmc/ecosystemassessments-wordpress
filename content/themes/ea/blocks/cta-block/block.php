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
  $background_image_opacity = get_theme_mod( 'cta_block_background_image_opacity' );
  $background_colour = get_theme_mod( 'cta_block_background_colour' );
?>

<div class="cta-Block" style="background-color: <?php echo $background_colour; ?>;">
  <img src="<?php echo $background_image_url; ?>" alt="<?php echo $title; ?>" class="cta-Block_BackgroundImage" style="opacity: <?php echo $background_image_opacity; ?>;">
  <div class="cta-Block_Inner">
    <div class="cta-Block_Body">
      <div class="cta-Block_Content">
        <h3 class="cta-Block_Title"><?php echo $title; ?></h3>
        <p class="cta-Block_Text"><?php echo $text; ?></p>
        <a href="<?php echo $link_url; ?>" class="cta-Block_Link<?php if ($link_url_external) echo ' cta-Block_Link--external'; ?>"<?php if ($link_url_external) echo ' target="_blank"'; ?><?php echo 'title="' . $link_text . '"'; ?>><?php echo $link_text; ?></a>
      </div>
    </div>
  </div>
</div>
