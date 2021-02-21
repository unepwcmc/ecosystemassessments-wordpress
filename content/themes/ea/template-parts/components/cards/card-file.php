<?php
  $filetype_data = get_the_terms(get_the_ID(), 'file_type');
  $filetype_name = $filetype_data[0]->name;
  $thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
?>

<article id="post-<?php echo $post_ID; ?>" class="card card--file">
	<header class="card__header">
    <?php
      if ( ! empty( $filetype_name != '' ) ) {
          echo '<span class="card__badge">' . $filetype_name . '</span>';
      }
    ?>
    <div class="card__image">
      <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
    </div>
	</header>
	<div class="card__body">
		<div class="card__content">
      <h3 class="card__title"><?php the_title(); ?></h3>
      <p class="card__link">View</p>
      <div class="card__icon"><?php get_template_part( 'template-parts/icons/icon',  $filetype_data[0]->slug ); ?></div>
		</div>
	</div>
  <a href="<?php echo get_field( 'file' ); ?>" class="card__fauxlink" title="<?php the_title(); ?>"></a>
</article><!-- #post-## -->
