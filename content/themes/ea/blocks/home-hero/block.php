<?php
  /*
    Home Hero Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $title = block_field( 'title', false );
  $text = block_field( 'text', false );
  $dark_text = block_field( 'dark-text', false );

  $link_url = block_field( 'link-url', false );
  $link_url_external = block_field( 'link-url-external', false );
  $link_text = block_field( 'link-text', false );

  $background_colour = block_field( 'background-colour', false );
  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];

  $image_opacity = block_field( 'image-opacity', false );
?>

<div class="her-Home<?php if ($dark_text) echo ' her-Home--dark'; ?>">
  <div class="her-Home_Inner">
    <div class="her-Home_Body" <?php if ($background_colour) echo 'style="background-color: ' . $background_colour . ';"'; ?>>
      <div class="her-Home_Content">
        <h2 class="her-Home_Title"><?php echo $title; ?></h2>
        <div class="her-Home_Text"><?php echo $text; ?></div>
        <a href="<?php echo $link_url; ?>" class="her-Home_Link<?php if ($link_url_external) echo ' her-Home_Link--external'; ?>"<?php if ($link_url_external) echo ' target="_blank"'; ?><?php echo 'title="' . $link_text . '"'; ?>><?php echo $link_text; ?>
          <?php if ($link_url_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
        </a>
      </div>
      <?php if ($image_url): ?>
        <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>" class="her-Home_BackgroundImage" style="opacity: <?php echo $image_opacity; ?>">
      <?php endif; ?>
    </div>
  </div>
</div>
