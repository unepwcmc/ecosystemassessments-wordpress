<?php
  $role_data = get_the_terms(get_the_ID(), 'role');
  $role_name = $role_data[0]->name;
  $location_data = get_the_terms(get_the_ID(), 'location');
  $location_name = $location_data[0]->name;
  $thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
?>

<article id="post-<?php echo $post_ID; ?>" class="card card--team team-modal-trigger">
	<header class="card__header">
    <?php
      if ( ! empty( $role_name != '' ) ) {
          echo '<span class="card__badge">' . $role_name . '</span>';
      }
    ?>
    <div class="card__image" data-member-image>
      <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
    </div>
	</header>
	<div class="card__body">
		<div class="card__content">
      <h3 class="card__title" data-member-name><?php the_title(); ?></h3>
      <p class="card__job-title" data-member-jobtitle><?php echo get_field( "job_title" ); ?></p>
      <p class="card__bio" data-member-bio><?php echo get_field( "bio" ); ?></p>
      <p class="card__email" data-member-email><?php echo get_field( "email_address" ); ?></p>
      <p class="card__location" data-member-location><?php echo $location_name; ?></p>
		</div>
	</div>
  <a href="#" class="card__fauxlink" title="Learn more about <?php the_title(); ?>"></a>
</article><!-- #post-## -->
