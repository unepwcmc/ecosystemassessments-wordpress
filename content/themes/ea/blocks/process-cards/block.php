<?php
/*
    Process Cards Block
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

<div class="section">
  <div class="section__inner">
    <div class="section__header">
      <h3 class="section__title">
        <?php echo block_value('section-title') ?>
      </h3>
    </div>

    <div class="section__body">

      <?php if ( $get_items->have_posts() ) : ?>
        <ul class="section__items">

          <?php while ( $get_items->have_posts() ) : $get_items->the_post(); ?>

            <li class="section__item">
              <?php get_template_part( 'template-parts/components/cards/card', 'process' ); ?>
            </li>

          <?php endwhile; ?>

        </ul>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </div>
</div>
