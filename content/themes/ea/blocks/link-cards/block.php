<?php
/*
    Link Cards Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  $title = block_value('section-title');
?>

<div class="section">
  <div class="section__inner">

  <?php if ($title !== '') : ?>
    <div class="section__header">
      <h3 class="section__title">
        <?php echo $title ?>
      </h3>
    </div>
  <?php endif; ?>

    <div class="section__body">

      <?php if (block_rows('card')) : ?>
        <ul class="section__items">

          <?php while (block_rows('card')) : block_row('card'); ?>

            <li class="section__item">
              <div class="card-listing__card">
                <header class="card-listing__header">
                  <?php if (block_sub_value('image')) : ?>
                    <?php $image_url = wp_get_attachment_image_src(block_sub_value('image'), 'full-size')[0]; ?>
                    <div class="card-listing__image-wrap">
                      <img
                        class="card-listing__image"
                        src="<?php echo $image_url; ?>"
                        alt="<?php echo block_sub_value('title'); ?>"
                      >
                    </div>
                  <?php endif; ?>
                  </header>
                <div class="card-listing__body">
                  <div class="card-listing__content">
                    <?php if (block_sub_value('text')) : ?>
                      <h3 class="card-listing__title">
                        <?php echo block_sub_value('text'); ?>
                      </h3>
                    <?php endif; ?>
                  </div>
                </div>

                <?php if (block_sub_value('link-url')) : ?>
                  <a class="card-listing__fauxlink" href="<?php echo block_sub_value('link-url'); ?>"></a>
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
