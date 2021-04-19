<?php
/*
    Statistic Cards
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://wordpress.org/plugins/genesis-custom-blocks/
  */
  $link_url = block_field( 'link-url', false );
  $link_args = array(
    'text' => block_field( 'link-text', false ),
    'url' => $link_url
  );

  $countries_worked_in = get_theme_mod( 'statistics_block_countries_count' );
  $resources_count = wp_count_posts( 'resource' )->publish ;
  $years_of_operation = get_theme_mod( 'statistics_block_years_count' );
?>

<div class="statistic-cards">
  <div class="statistic-cards__body">
      <ul class="statistic-cards__items">
        <?php if( $countries_worked_in != 0 ): ?>
          <li class="statistic-cards__item">
            <div class="statistic-card">
              <h3 class="statistic-card__title">
                <?php echo $countries_worked_in; ?>
              </h3>
              <p class="statistic-card__text">
                <?php _e('Countries worked in'); ?>
              </p>
            </div>
          </li>
        <?php endif; ?>
        <?php if( $resources_count != 0 ): ?>
          <li class="statistic-cards__item">
            <div class="statistic-card">
              <h3 class="statistic-card__title">
                <?php echo $resources_count; ?>
              </h3>
              <p class="statistic-card__text">
                <?php _e('Resources'); ?>
              </p>
            </div>
          </li>
        <?php endif; ?>
        <?php if( $years_of_operation != 0 ): ?>
          <li class="statistic-cards__item">
            <div class="statistic-card">
              <h3 class="statistic-card__title">
                <?php echo $years_of_operation; ?>
              </h3>
              <p class="statistic-card__text">
                <?php _e('Years of operation'); ?>
              </p>
            </div>
          </li>
        <?php endif; ?>
      </ul>
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
