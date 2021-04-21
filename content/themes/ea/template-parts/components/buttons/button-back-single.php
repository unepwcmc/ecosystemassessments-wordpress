<?php
$back_url = '/';
$post_type = get_post_type( get_the_ID() );
$post_type_obj = get_post_type_object ( $post_type );
$post_type_plural = $post_type_obj->labels->name === 'Posts'
  ? 'news'
  : lcfirst($post_type_obj->labels->name);

switch ($post_type) {
  case event:
      $back_url = '/events';
      break;
  case post:
      $back_url = '/news';
      break;
  case resource:
      $back_url = '/resource-list';
      break;
}
?>

<a
  href="<?php echo $back_url; ?>"
  class="entry__header-link"
>
  <?php get_template_part('template-parts/icons/icon', 'arrow-left'); ?>
  <?php echo 'View all ' . $post_type_plural; ?>
</a>
