<?php
/*
    Statistic Cards
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */
  $link_url = block_field('link-url', false);
  $link_args = array(
    'text' => block_field( 'link-text', false ),
    'url' => $link_url
  );
?>

<div class="statistic-cards">
  <div class="statistic-cards__body">
    <?php if (block_rows('statistic-card')) : ?>
      <ul class="statistic-cards__items">
        <?php while (block_rows('statistic-card')) : block_row('statistic-card'); ?>
          <li class="statistic-cards__item">
            <div class="statistic-card">
              <?php if (block_sub_value('value')) : ?>
                <h3 class="statistic-card__title">
                  <?php echo block_sub_value('value'); ?>
                </h3>
              <?php endif; ?>
              <?php if (block_sub_value('statistic')) : ?>
                <p class="statistic-card__text">
                  <?php echo block_sub_value('statistic'); ?>
                </p>
              <?php endif; ?>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif;
    reset_block_rows('tile'); ?>
  </div>

  <?php if ($link_url !== '') : ?>
    <div class="statistic-cards__footer">
      <a href="<?php echo $link_args['url']; ?>" class="statistic-cards__link">
        <?php echo $link_args['text']; ?>
        <?php get_template_part('template-parts/icons/icon', 'view-more'); ?>
      </a>
    </div>
  <?php endif; ?>
</div>
