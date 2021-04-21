<?php
// Variables
$back_url = get_field('back_button_url');
$back_text = get_field('back_button_text');
?>

<?php if($back_url != '') : ?>
  <a
    href="<?php echo $back_url; ?>"
    class="entry__header-link"
  >
    <?php get_template_part('template-parts/icons/icon', 'arrow-left'); ?>
    <?php echo $back_text; ?>
  </a>
<?php endif; ?>
