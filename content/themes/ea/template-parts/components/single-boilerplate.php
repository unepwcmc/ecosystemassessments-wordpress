<?php
  /* Variables */
  $text = get_theme_mod( 'blog_posts_boilerplate' );
?>

<?php if ($text): ?>
  <div class="article-boilerplate">
    <div class="article-boilerplate__text">
      <?php echo $text; ?>
    </div>
  </div>
<?php endif; ?>
