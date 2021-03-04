<?php
/*
    Descriptive Cards Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */
?>

<div class="descriptive-cards">
  <div class="descriptive-cards__inner">
    <div class="descriptive-cards__header">
      <h3 class="descriptive-cards__title">
        <?php echo block_value('section-title') ?>
      </h3>
    </div>

    <div class="descriptive-cards__body">

      <?php if (block_rows('card')) : ?>
        <ul class="descriptive-cards__items">

          <?php while (block_rows('card')) : block_row('card'); ?>

            <li class="descriptive-cards__item">
              <div class="descriptive-card">
                <div class="descriptive-card__header">
                  <?php if (block_sub_value('image')) : ?>
                    <?php $image_url = wp_get_attachment_image_src(block_sub_value('image'), 'full-size')[0]; ?>
                    <div class="descriptive-card__image-wrap">
                      <img 
                        class="descriptive-card__image" 
                        src="<?php echo $image_url; ?>" 
                        alt="<?php echo block_sub_value('title'); ?>"
                      >
                    </div>
                  <?php endif; ?>
                </div>
                <div class="descriptive-card__body">
                  <?php if (block_sub_value('description')) : ?>
                    <h3 class="descriptive-card__title">
                      <?php echo block_sub_value('description'); ?>
                    </h3>
                  <?php endif; ?>
                </div>

                <?php if (block_sub_value('link-url')) : ?>
                  <a class="descriptive-card__fauxlink" href="<?php echo block_sub_value('link-url'); ?>"></a>
                <?php endif; ?>
              </div>
            </li>

          <?php endwhile; ?>

        </ul>
      <?php endif;
      reset_block_rows('card'); ?>
    </div>
  </div>
</div>