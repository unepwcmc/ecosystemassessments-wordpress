<?php
/*
    Tiles Icon Large
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */
?>

<div class="tiles-icon">
  <div class="tiles-icon__inner">
    <div class="tiles-icon__body">
      <?php if (block_rows('tile')) : ?>
        <ul class="tiles-icon__items">

          <?php while (block_rows('tile')) : block_row('tile'); ?>

            <li class="tiles-icon__item">
              <div class="tile-icon">
                <div class="tile-icon__body">
                  <?php if (block_sub_value('icon')) : ?>
                    <div class="tile-icon__icon">
                      <?php get_template_part('template-parts/icons/icon', block_sub_value('icon')) ?>
                    </div>
                  <?php endif; ?>

                  <?php if (block_sub_value('title')) : ?>
                    <h4 class="tile-icon__title">
                      <?php echo block_sub_value('title'); ?>
                    </h4>
                  <?php endif; ?>

                  <?php if (block_sub_value('description')) : ?>
                    <p class="tile-icon__description">
                      <?php echo block_sub_value('description'); ?>
                    </p>
                  <?php endif; ?>

                  <div class="tile-icon__links">
                    <?php if (block_sub_value('link-one')) : ?>
                      <a class="tile-icon__link" href="<?php echo block_sub_value('link-one'); ?>">
                        <?php echo block_sub_value('link-one-text'); ?>
                      </a>
                    <?php endif; ?>

                    <?php if (block_sub_value('link-two')) : ?>
                      <a class="tile-icon__link" href="<?php echo block_sub_value('link-two'); ?>">
                        <?php echo block_sub_value('link-two-text'); ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </li>

          <?php endwhile; ?>

        </ul>
      <?php endif;
      reset_block_rows('tile'); ?>
    </div>
  </div>
</div>
