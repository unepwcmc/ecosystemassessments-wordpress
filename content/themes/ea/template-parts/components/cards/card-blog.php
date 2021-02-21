<?php
  $post_categories = get_the_category();
  $thumbnail_override = get_field( 'small_image' );

  if ($thumbnail_override != '') {
    $thumbnail_url = $thumbnail_override;
  } else {
    $thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
  }
?>

<article id="post-<?php the_ID(); ?>" class="card card--blog">
	<header class="card__header">
    <?php
      if ( ! empty( $post_categories ) ) {
          echo '<span class="card__badge">' . esc_html( $post_categories[0]->name ) . '</span>';
      }
    ?>
    <div class="card__image">
      <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
    </div>
	</header>
	<div class="card__body">
		<div class="card__content">
      <p class="card__details"><?php the_time( 'd/m/y' ); ?></p>
      <h3 class="card__title"><?php the_title(); ?></h3>
      <p class="card__link">More</p>
		</div>
	</div>
  <a class="card__fauxlink" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
</article><!-- #post-## -->
