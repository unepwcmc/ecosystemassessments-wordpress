<?php
  /*
    Full Width Image Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  /* Variables */
  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
  $image_alt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
  $caption = block_field( 'caption', false );
?>

<figure class="block-full-width-image">
  <div class="block-full-width-image__image-wrap">
    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="block-full-width-image__image">
  </div>
  <?php if ($caption): ?>
    <figcaption class="block-full-width-image__caption"><?php echo $caption; ?></figcaption>
    <div class="block-full-width-image__overlay"></div>
  <?php endif; ?>
</figure>
