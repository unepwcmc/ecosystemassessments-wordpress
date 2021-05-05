
<div class="ent-Entry_Downloads">
  <?php if( have_rows('downloads') ): ?>
    <?php if( get_field('select_menu') ): ?>
      <?php
        $post_type = '';
        if (get_post_type() == 'resource') {
          $post_type = 'resources';
        } else if (get_post_type() == 'samples') {
          $post_type = 'samples';
        } else if (get_post_type() == 'training_video') {
          $post_type = 'training_video';
        }
      ?>
      <download-list post-id="<?php echo get_the_ID(); ?>" post-type="<?php echo $post_type; ?>" label="<?php echo get_field('select_menu_placeholder'); ?>" />
    <?php else : ?>
      <ul class="res-Download_Items">
        <?php while ( have_rows('downloads') ) : the_row(); ?>
          <li class="res-Download_Item">
            <a href="<?php the_sub_field('download_file'); ?>" class="res-Download_Link" title="<?php the_sub_field('download_title'); ?>" target="_blank"><?php the_sub_field('download_title'); ?></a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  <?php endif; ?>
</div>
