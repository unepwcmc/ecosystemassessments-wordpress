<?php
  /*
    Image Text Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $title = block_field( 'title', false );
  $text = block_field( 'text', false );
  $link_url = block_field( 'link-url', false );
  $link_text = block_field( 'link-text', false );

  $image = block_field( 'image', false );
  $img_url = wp_get_attachment_image_url( $image, 'full-size' );
?>

<div class="block-image-text">
  <div class="block-image-text__inner">
    <div class="block-image-text__columns">
      <div class="block-image-text__column block-image-text__column--image">
        <div class="block-image-text__image-wrap">
          <img src="<?php echo $img_url; ?>" alt="<?php echo $title; ?>" class="block-image-text__image">
        </div>
      </div>
      <div class="block-image-text__column block-image-text__column--text">
        <h3 class="block-image-text__title"><?php echo $title; ?></h3>
        <div class="block-image-text__text">
          <?php echo $text; ?>
          <a href="<?php echo $link_url; ?>" class="block-image-text__link"><?php echo $link_text; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
