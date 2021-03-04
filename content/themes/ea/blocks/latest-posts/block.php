<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $post_label = block_value( 'post-label' );
  $post_type = block_value( 'post-type' );
  $block_field_config = block_field_config( 'post-type' );

  foreach ($block_field_config['settings']['options'] as $option) {
    if (in_array($post_type, $option)) {
      $post_label = $option['label'];
    }
  }

  $link_url = '/' . strtolower($post_label);
  $link_args = array(
    'text' => block_field( 'link-text', false ), 
    'url' => $link_url
  );
?>

<div class="listing-latest">
  <div class="listing-latest__inner">
    <div class="listing-latest__header">
      <h3 class="listing-latest__title">Latest <?php echo $post_label; ?></h3>
    </div>
    <div class="listing-latest__body">

      <latest-posts
        post-type="<?php echo $post_type; ?>"
        post-url="<?php echo $post_label; ?>"
      />

    </div>
  </div>

  <?php if ($link_url !== '') : ?>
    <?php set_query_var('link_args', $link_args); ?>
    <?php get_template_part('template-parts/components/links/link', 'view-more'); ?>
  <?php endif; ?>
</div>
