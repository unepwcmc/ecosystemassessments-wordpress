<?php
  /*
    Featured Link Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $title = block_field( 'title', false );
  $dark_text = block_field( 'dark-text', false );

  $link_url = block_field( 'link-url', false );
  $link_url_external = block_field( 'link-url-external', false );
  $link_text = block_field( 'link-text', false );

  $background_colour = block_field( 'background-colour', false );
  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];

  $overlay_opacity = block_field( 'overlay-opacity', false );
?>

<div class="featured-link<?php if ($dark_text) echo ' featured-link--dark'; ?>">
  <div class="featured-link__body" <?php if ($background_colour) echo 'style="background-color: ' . $background_colour . ';"'; ?>>
    <div class="featured-link__content">
      <?php if ($title !== '') : ?>
        <h2 class="featured-link__title"><?php echo $title; ?></h2>
      <?php endif; ?>

      <?php if ($link_url !== '') : ?>
        <a
          href="<?php echo $link_url; ?>"
          class="featured-link__link<?php if ($link_url_external) echo ' featured-link__link--external'; ?>"
          <?php if ($link_url_external) echo ' target="_blank"'; ?>
          <?php echo ' title="' . $link_text . '"'; ?>
        >
          <?php echo $link_text; ?>
          <?php if ($link_url_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
        </a>
      <?php endif; ?>
    </div>
    <?php if ($image_url): ?>
      <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>" class="featured-link__background-image">
    <?php endif; ?>
    <div class="featured-link__overlay" style="opacity: <?php echo $overlay_opacity; ?>"></div>
  </div>
</div>
