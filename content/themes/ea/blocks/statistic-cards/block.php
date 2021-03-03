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
  <?php if (block_rows('statistic-card')) : ?>
    <ul class="statistic-cards__cards">
      <?php while (block_rows('statistic-card')) : block_row('statistic-card'); ?>
        <li class="statistic-cards__card">
          <div class="statistic-card">
            <?php if (block_sub_value('value')) : ?>
              <h3 class="statistic-card__value">
                <?php echo block_sub_value('value'); ?>
              </h3>
            <?php endif; ?>
            <?php if (block_sub_value('statistic')) : ?>
              <p class="statistic-card__statistic">
                <?php echo block_sub_value('statistic'); ?>
              </p>
            <?php endif; ?>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif;
  reset_block_rows('tile'); ?>
  
  <?php if ($link_url !== '') : ?>
    <?php set_query_var('link_args', $link_args); ?>
    <?php get_template_part('template-parts/components/links/link', 'view-more'); ?>
  <?php endif; ?>
</div>