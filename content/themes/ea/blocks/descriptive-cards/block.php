<?php
/*
    Descriptive Cards Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  /* Query */
  $get_items_query = array(
    'post_type' => 'process',
    'posts_per_page' => 3
  );

  $get_items = new WP_Query($get_items_query);
?>

<div class="descriptive-cards">
  <div class="descriptive-cards__inner">
    <div class="descriptive-cards__header">
      <h3 class="descriptive-cards__title">
        <?php echo block_value('section-title') ?>
      </h3>
    </div>

    <div class="descriptive-cards__body">

      <?php if ( $get_items->have_posts() ) : ?>
        <ul class="descriptive-cards__items">

          <?php while ( $get_items->have_posts() ) : $get_items->the_post(); ?>

            <li class="descriptive-cards__item">
              <?php get_template_part( 'template-parts/components/cards/card', 'process' ); ?>
            </li>

          <?php endwhile; ?>

        </ul>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </div>
</div>
