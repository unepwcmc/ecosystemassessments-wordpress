<?php
  $link_args = get_query_var('link_args');
?>

<?php if ($link_args['text'] !== '' && $link_args['url'] !== '') : ?>
  <div class="link-view-more">
    <a href="<?php echo $link_args['url']; ?>" class="link-view-more__link">
      <?php echo $link_args['text']; ?>
      <div class="link-view-more__icon-wrapper">
        <div class="link-view-more__icon">
          <?php get_template_part('template-parts/icons/icon', 'angle-right'); ?>
        </div>
      </div>
    </a>
  </div>
<?php endif; ?>