<?php
  /*
    Icon Link Tiles Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */

  // Variables

  $section_title = block_field( 'section-title', false );
?>

<div class="icon-link-tiles">
  <div class="icon-link-tiles__header">
    <h3 class="icon-link-tiles__title">
      <?php echo $section_title; ?>
    </h3>
  </div>
  <div class="icon-link-tiles__body">
    <?php if ( block_rows( 'tile' ) ) : ?>
      <ul class="icon-link-tiles__items">

        <?php while ( block_rows( 'tile' ) ) : block_row( 'tile' );?>

          <li class="icon-link-tiles__item">

            <div class="icon-link-tile">
              <div class="icon-link-tile__content">
                <?php if ( block_sub_value( 'title' ) ) : ?>
                  <h4 class="icon-link-tile__title">
                    <?php echo block_sub_value( 'title' ); ?>
                  </h4>
                <?php endif; ?>

                <?php if (block_sub_value('icon')) : ?>
                  <div class="icon-link-tile__icon">
                    <?php get_template_part('template-parts/icons/icon', block_sub_value('icon')); ?>
                  </div>
                <?php endif; ?>

                <?php if ( block_sub_value( 'link-url' ) ) : ?>
                  <a class="icon-link-tile__fauxlink" href="<?php echo block_sub_value( 'link-url' ); ?>"></a>
                <?php endif; ?>
              </div>
            </div>

          </li>

        <?php endwhile; ?>

      </ul>
    <?php endif; reset_block_rows( 'tile' ); ?>
  </div>
</div>
