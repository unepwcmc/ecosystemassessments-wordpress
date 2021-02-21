<?php
  /*
    Contact Column Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $title = get_theme_mod( 'contact_details_title' );

  $heading_1 = get_theme_mod( 'contact_details_heading_1' );
  $address_1 = get_theme_mod( 'contact_details_address_1' );
  $phone_1 = get_theme_mod( 'contact_details_phone_1' );

  $heading_2 = get_theme_mod( 'contact_details_heading_2' );
  $address_2 = get_theme_mod( 'contact_details_address_2' );
  $phone_2 = get_theme_mod( 'contact_details_phone_2' );

  $heading_3 = get_theme_mod( 'contact_details_heading_3' );
  $address_3 = get_theme_mod( 'contact_details_address_3' );
  $phone_3 = get_theme_mod( 'contact_details_phone_3' );
?>

<div class="block-contact">
  <div class="block-contact__inner">
    <div class="block-contact__header">
      <h3 class="block-contact__title"><?php echo $title; ?></h3>
    </div>
    <div class="block-contact__body">
      <div class="block-contact__columns">
        <?php if ($heading_1 || $address_1 || $phone_1): ?>
          <div class="block-contact__column">
            <?php if ($heading_1): ?>
              <h4 class="block-contact__heading"><?php echo $heading_1; ?></h4>
            <?php endif; ?>
            <?php if ($address_1): ?>
              <p class="block-contact__text"><?php echo nl2br($address_1); ?></p>
            <?php endif; ?>
            <?php if ($phone_1): ?>
              <a href="<?php echo 'tel:' . $phone_1; ?>" class="blk-Content__link"><?php echo $phone_1; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($heading_2 || $address_2 || $phone_2): ?>
          <div class="block-contact__column">
            <?php if ($heading_2): ?>
              <h4 class="block-contact__heading"><?php echo $heading_2; ?></h4>
            <?php endif; ?>
            <?php if ($address_2): ?>
              <p class="block-contact__text"><?php echo nl2br($address_2); ?></p>
            <?php endif; ?>
            <?php if ($phone_2): ?>
              <a href="<?php echo 'tel:' . $phone_2; ?>" class="blk-Content__link"><?php echo $phone_2; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($heading_3 || $address_3 || $phone_3): ?>
          <div class="block-contact__column">
            <?php if ($heading_3): ?>
              <h4 class="block-contact__heading"><?php echo $heading_3; ?></h4>
            <?php endif; ?>
            <?php if ($address_3): ?>
              <p class="block-contact__text"><?php echo nl2br($address_3); ?></p>

            <?php endif; ?>
            <?php if ($phone_3): ?>
              <a href="<?php echo 'tel:' . $phone_3; ?>" class="blk-Content__link"><?php echo $phone_3; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
