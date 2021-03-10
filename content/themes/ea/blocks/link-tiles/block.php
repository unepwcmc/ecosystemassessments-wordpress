<?php
/*
    Link Tiles Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */

// Variables

$section_title = block_field('section-title', false);

$link_args = array(
  'text' => block_field('section-link-text', false),
  'url' => block_field('section-link-url', false)
);
?>

<div class="link-tiles">
  <div class="link-tiles__inner">
    <div class="link-tiles__header">
      <h3 class="link-tiles__title">
        <?php echo $section_title; ?>
      </h3>
    </div>
    <div class="link-tiles__body">
      <?php if (block_rows('tile')) : ?>
        <ul class="link-tiles__items">

          <?php while (block_rows('tile')) : block_row('tile'); ?>

            <li class="link-tiles__item">
              <div class="link-tile">
                <?php if (block_sub_value('title')) : ?>
                  <h4 class="link-tile__title">
                    <?php echo block_sub_value('title'); ?>
                  </h4>
                <?php endif; ?>

                <?php if (block_sub_value('image')) : ?>
                  <?php $image_url = wp_get_attachment_image_src(block_sub_value('image'), 'full-size')[0]; ?>
                  <img class="link-tile__image" src="<?php echo $image_url; ?>" alt="<?php echo block_sub_value('title'); ?>">
                  <div class="link-tile__image-overlay"></div>
                <?php endif; ?>

                <?php if (block_sub_value('link-url')) : ?>
                  <a class="link-tile__fauxlink" href="<?php echo block_sub_value('link-url'); ?>"></a>
                <?php endif; ?>
              </div>
            </li>

          <?php endwhile; ?>

        </ul>
      <?php endif;
      reset_block_rows('tile'); ?>
    </div>

    <?php if ($link_args['url'] !== '') : ?>
      <div class="link-tiles__footer">
        <a href="<?php echo $link_args['url']; ?>" class="link-tiles__link">
          <?php echo $link_args['text']; ?>
          <?php get_template_part('template-parts/icons/icon', 'view-more'); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>