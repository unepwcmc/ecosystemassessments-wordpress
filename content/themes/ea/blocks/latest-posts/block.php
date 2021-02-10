<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $post_label = '';
  $post_type = block_value( 'post-type' );
  $block_field_config = block_field_config( 'post-type' );

  foreach ($block_field_config['settings']['options'] as $option) {
    if (in_array($post_type, $option)) {
      $post_label = $option['label'];
    }
  }
?>
<div class="lst-Latest">
  <div class="lst-Latest_Inner">
    <div class="lst-Latest_Header">
      <h3 class="lst-Latest_Title">Latest <?php echo $post_label; ?></h3>
      <a href="<?php echo '/' . strtolower($post_label); ?>" class="lst-Latest_Link">View all</a>
    </div>
    <div class="lst-Latest_Body">

      <latest-posts
        post-type="<?php echo $post_type; ?>"
        post-url="<?php echo $post_label; ?>"
      />

    </div>
  </div>
</div>
