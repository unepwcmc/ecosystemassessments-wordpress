<?php
  /*
    Link Tiles Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<div class="block-link-tiles">
  <div class="block-link-tiles__inner">
    <div class="block-link-tiles__body">
      <?php if ( block_rows( 'tile' ) ) : ?>
        <ul class="block-link-tiles__items">

          <?php while ( block_rows( 'tile' ) ) : block_row( 'tile' );?>
            <li class="block-link-tiles__item">

              <div class="block-link-tile">
                <div class="block-link-tile__image-wrap">
                  <?php
                    $attachment_id = block_sub_value( 'image' );
                    $img_url = wp_get_attachment_image_url( $attachment_id, 'full-size' );
                  ?>
                  <img src="<?php echo $img_url; ?>" alt="#" class="block-link-tile__image">
                </div>

                <div class="block-link-tile__content">
                  <?php if ( block_sub_value( 'title' ) ) : ?>
                    <h3 class="block-link-tile__title"><?php echo block_sub_value( 'title' ); ?></h3>
                  <?php endif;?>

                  <?php if ( block_sub_value( 'text' ) ) : ?>
                    <p class="block-link-tile__text"><?php echo block_sub_value( 'text' ); ?></p>
                  <?php endif;?>

                  <?php if ( block_sub_value( 'link-url' ) ) : ?>
                    <p class="block-link-tile__link">
                      <?php get_template_part( '/template-parts/icons/icon', 'arrow-right' ); ?>
                      <?php echo block_sub_value( 'link-text' ); ?>
                    </p>
                    <a href="<?php echo block_sub_value( 'link-url' ); ?>" class="block-link-tile__fauxlink" title="<?php echo block_sub_value( 'link-text' ); ?>"></a>
                  <?php endif;?>
                </div>
              </div>

            </li>
          <?php endwhile; ?>

        </ul>
      <?php endif; reset_block_rows( 'tile' ); ?>
    </div>
  </div>
</div>
