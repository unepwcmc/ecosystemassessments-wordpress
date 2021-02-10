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

<div class="blk-ImageText">
  <div class="blk-ImageText_Inner">
    <div class="blk-ImageText_Columns">
      <div class="blk-ImageText_Column blk-ImageText_Column--image">
        <div class="blk-ImageText_ImageWrap">
          <img src="<?php echo $img_url; ?>" alt="<?php echo $title; ?>" class="blk-ImageText_Image">
        </div>
      </div>
      <div class="blk-ImageText_Column blk-ImageText_Column--text">
        <h3 class="blk-ImageText_Title"><?php echo $title; ?></h3>
        <div class="blk-ImageText_Text">
          <?php echo $text; ?>
          <a href="<?php echo $link_url; ?>" class="blk-ImageText_Link"><?php echo $link_text; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
