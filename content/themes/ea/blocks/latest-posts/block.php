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
      <h3 class="listing-latest__title"><?php _e( 'Latest' ) ?> <?php echo $post_label; ?></h3>
    </div>
    <div class="listing-latest__body">

      <latest-posts
        post-type="<?php echo $post_type; ?>"
        post-url="<?php echo $post_label; ?>"
      />

    </div>

    <?php if ($link_url !== '') : ?>
      <div class="listing-latest__footer">
        <a href="<?php echo $link_args['url']; ?>" class="listing-latest__link">
          <?php echo $link_args['text']; ?>
          <?php get_template_part('template-parts/icons/icon', 'view-more'); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
