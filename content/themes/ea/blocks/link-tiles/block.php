<?php
  /*
    Link Tiles Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<div class="blk-LinkTiles">
  <div class="blk-LinkTiles_Inner">
    <div class="blk-LinkTiles_Body">
      <?php if ( block_rows( 'tile' ) ) : ?>
        <ul class="blk-LinkTiles_Items">

          <?php while ( block_rows( 'tile' ) ) : block_row( 'tile' );?>
            <li class="blk-LinkTiles_Item">

              <div class="blk-LinkTile">
                <div class="blk-LinkTile_ImageWrap">
                  <?php
                    $attachment_id = block_sub_value( 'image' );
                    $img_url = wp_get_attachment_image_url( $attachment_id, 'full-size' );
                  ?>
                  <img src="<?php echo $img_url; ?>" alt="#" class="blk-LinkTile_Image">
                </div>

                <div class="blk-LinkTile_Content">
                  <?php if ( block_sub_value( 'title' ) ) : ?>
                    <h3 class="blk-LinkTile_Title"><?php echo block_sub_value( 'title' ); ?></h3>
                  <?php endif;?>

                  <?php if ( block_sub_value( 'text' ) ) : ?>
                    <p class="blk-LinkTile_Text"><?php echo block_sub_value( 'text' ); ?></p>
                  <?php endif;?>

                  <?php if ( block_sub_value( 'link-url' ) ) : ?>
                    <p class="blk-LinkTile_Link">
                      <?php get_template_part( '/template-parts/icons/icon', 'arrow-right' ); ?>
                      <?php echo block_sub_value( 'link-text' ); ?>
                    </p>
                    <a href="<?php echo block_sub_value( 'link-url' ); ?>" class="blk-LinkTile_FauxLink" title="<?php echo block_sub_value( 'link-text' ); ?>"></a>
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
