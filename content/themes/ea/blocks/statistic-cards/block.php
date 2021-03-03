<?php
/*
    Statistic Cards
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */
?>

<div class="statistic-cards">
  <?php if (block_rows('statistic-card')) : ?>
    <ul class="statistic-cards__cards">
      <?php while (block_rows('statistic-card')) : block_row('statistic-card'); ?>
        <li class="statistic-cards__card">
          <div class="statistic-card">
            <?php if (block_sub_value('value')) : ?>
              <h2 class="statistic-card__value">
                <?php echo block_sub_value('value'); ?>
              </h2>
            <?php endif; ?>
            <?php if (block_sub_value('statistic')) : ?>
              <h4 class="statistic-card__statistic">
                <?php echo block_sub_value('statistic'); ?>
              </h4>
            <?php endif; ?>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif;
  reset_block_rows('tile'); ?>
</div>